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
use function phln\object\pathOr;

class CreateDocsCommand extends Command
{
    protected $signature = 'create:docs';

    private $docBlockFactory;

    private $docsDir = __DIR__.'/../../docs/functions';

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
        $this->prepareOutputDirectory();

        $this->output->writeln('Extracting contents');
        $phlnReflection = new \ReflectionClass(Phln::class);
        $docBlocks = $this->extractDocBlocks($phlnReflection);

        foreach ($docBlocks as $category => $methods) {
            $this->output->writeln("Exporting docs for {$category}");
            $this->exportCategoryDocs($category, $methods);
        }

        $this->output->writeln('<info>Done</info>');
    }

    private function prepareOutputDirectory()
    {
        if (false === $this->filesystem->exists($this->docsDir)) {
            $this->filesystem->makeDirectory($this->docsDir, 0755, true);
            return;
        }

        $this->filesystem->cleanDirectory($this->docsDir);
    }

    /**
     * Extract doc blocks of methods and group them by `@phlnCategory` tag
     *
     * @param \ReflectionClass $reflection
     * @return array
     */
    private function extractDocBlocks(\ReflectionClass $reflection): array
    {
        $methods = $reflection->getMethods();

        return apply(
            pipe([
                map(function (\ReflectionMethod $method) {
                    $comment = $method->getDocComment();

                    return [
                        'name' => $method->getName(),
                        'docBlock' => $this->docBlockFactory->create($comment),
                    ];
                }),
                reduce(function ($carry, array $method) {
                    $category = (string)$this->getDocBlockTag('phlnCategory', $method['docBlock']->getTags());

                    if (true === empty($category)) {
                        throw new \RuntimeException("Missing category for function: {$method['name']}");
                    }

                    return array_merge($carry, [
                        $category => array_merge(pathOr($category, [], $carry), [$method]),
                    ]);
                }, [])
            ]),
            [$methods]
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
        $outputFile = $this->docsDir."/{$category}.md";

        $rendered = $this->view->make('docs-category')
            ->with([
                'category' => $category,
                'methods' => map([$this, 'getMethodToView'], $methods),
            ])
            ->render();

        $this->filesystem->put($outputFile, $rendered);
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
