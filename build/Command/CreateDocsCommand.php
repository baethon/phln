<?php
declare(strict_types=1);

namespace Phln\Build\Command;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\View\Factory;
use phln\Phln;
use phpDocumentor\Reflection\DocBlock;
use phpDocumentor\Reflection\DocBlock\Tags\BaseTag;
use phpDocumentor\Reflection\DocBlockFactory;
use function phln\collection\filter;
use function phln\collection\map;
use function phln\collection\reduce;
use function phln\fn\apply;
use function phln\fn\pipe;
use function phln\fn\compose;
use function phln\fn\invoker;
use function phln\object\pathOr;
use function phln\string\split;
use function phln\string\replace;
use const phln\collection\last;

class CreateDocsCommand extends Command
{
    protected $signature = 'create:docs';

    private $docBlockFactory;

    private $paths = [
        'functions' => __DIR__.'/../../docs/functions/',
    ];

    /**
     * @var Factory
     */
    private $view;

    /**
     * @var Filesystem
     */
    private $filesystem;

    public function __construct(Factory $view, Filesystem $filesystem)
    {
        parent::__construct();
        $this->docBlockFactory = DocBlockFactory::createInstance();
        $this->view = $view;
        $this->filesystem = $filesystem;
    }

    public function handle()
    {
        $this->output->writeln('Preparing directories');
        $this->cleanup();

        $this->output->writeln('Extracting contents');
        $phlnReflection = new \ReflectionClass(Phln::class);
        $docBlocks = $this->extractDocBlocks($phlnReflection);

        foreach ($docBlocks as $category => $methods) {
            $this->output->writeln("Exporting docs for {$category}");
            $this->exportCategoryDocs($category, $methods);
        }

        $this->output->writeln('<info>Done</info>');
    }

    private function cleanup()
    {
        foreach ($this->paths as $path) {

            if ($this->filesystem->isDirectory($path)) {
                $this->filesystem->cleanDirectory($path);
            } else {
                $this->filesystem->delete($this->paths);
            }
        }
    }

    /**
     * Extract doc blocks of methods and group them by `@phlnCategory` tag
     *
     * @param \ReflectionClass $reflection
     * @return array
     */
    private function extractDocBlocks(\ReflectionClass $reflection): array
    {
        $constants = $reflection->getConstants();
        $basename = compose([last, split('\\')]);

        return apply(
            pipe([
                filter('\\function_exists'),
                map(function (string $fnName) {
                    return new \ReflectionFunction($fnName);
                }),
                map(function (\ReflectionFunction $function) use ($basename) {
                    $comment = $this->getDocComment($function);

                    return [
                        'name' => $basename($function->getName()),
                        'docBlock' => $this->docBlockFactory->create($comment),
                    ];
                }),
                reduce(function ($carry, array $function) {
                    $category = (string)$this->getDocBlockTag('phlnCategory', $function['docBlock']->getTags());

                    if (true === empty($category)) {
                        throw new \RuntimeException("Missing category for function: {$function['name']}");
                    }

                    return array_merge($carry, [
                        $category => array_merge(pathOr($category, [], $carry), [$this->getMethodToView($function)]),
                    ]);
                }, [])
            ]),
            [$constants]
        );
    }

    private function getDocComment(\ReflectionFunction $function): string
    {
        return apply(
            pipe([
                invoker(0, 'getDocComment'),
                replace('/^/gm', '    '),
                replace('/\\\\phln\\\\\w+\\\\(\w+)(\()?/g', 'P::$1$2'),
                replace('/phln\\\\\w+\\\\(\w+)/g', 'P::$1'),
            ]),
            [$function]
        );
    }

    private function getDocBlockTag(string $name, array $tags)
    {
        return \phln\collection\head($this->getDocBlockTagsList($name, $tags));
    }

    /**
     * @param string $name
     * @param BaseTag[] $tags
     * @return array
     */
    private function getDocBlockTagsList(string $name, array $tags): array
    {
        return filter(function (BaseTag $tag) use ($name) {
            return $name === $tag->getName();
        }, $tags);
    }

    /**
     * @param string $category
     * @param array $methods
     */
    private function exportCategoryDocs(string $category, array $methods)
    {
        $rendered = $this->view->make('docs.category')
            ->with(compact('category', 'methods'))
            ->render();

        $this->filesystem->append($this->paths['functions']."/{$category}.md", $rendered);
    }

    public function getMethodToView(array $method): array
    {
        /** @var DocBlock $docBlock */
        $docBlock = $method['docBlock'];
        $tags = $docBlock->getTags();
        $name = $method['name'];
        $signatures = $this->getDocBlockTagsList('phlnSignature', $tags);
        $example = $this->getDocBlockTag('example', $tags);
        $summary = $docBlock->getSummary();
        $description = $docBlock->getDescription();

        return compact('name', 'signatures', 'example', 'summary', 'description');
    }
}
