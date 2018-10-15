<?php
declare(strict_types=1);

namespace Phln\Build\Command;

use Baethon\Phln\Phln as P;
use Illuminate\View\Factory;
use Illuminate\Console\Command;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

class CreateMacroCommand extends Command
{
    protected $signature = 'create:macro {ns} {name}';

    /**
     * @var Factory
     */
    private $view;

    public function __construct(Factory $view)
    {
        parent::__construct();
        $this->view = $view;
    }

    public function handle()
    {
        $ns = $this->argument('ns');
        $name = $this->argument('name');

        $this->validateFunctionName($name);

        $this->output->writeln(sprintf(
            'Function created at: <info>%s</info>',
            $this->createFunctionSource($ns, $name)
        ));

        $this->output->writeln(sprintf(
            'Test created at: <info>%s</info>',
            $this->createTestSource($ns, $name)
        ));

        $this->reloadBundlesFile();
        $this->output->writeln('Bundle file reloaded');
    }

    private function validateFunctionName($name)
    {
        if (P::hasMacro($name)) {
            throw new \Exception("Name [{$name}] is in use");
        }
    }

    private function createFunctionSource($ns, $name)
    {
        return $this->generateFile('function', 'src/macros', $ns, $name);
    }

    private function createTestSource($ns, $name)
    {
        return $this->generateFile('function-test', 'tests/macros', $ns, $name, ucfirst($name).'Test');
    }

    private function generateFile($template, $location, $ns, $name, $fileName = null)
    {
        $contents = $this->view->make($template)
            ->with(compact('ns', 'name'))
            ->render();

        $path = sprintf(
            '%s/../../%s/%s/%s.php',
            __DIR__,
            $location,
            $ns,
            $fileName ?: $name
        );
        $dir = dirname($path);

        if (false === is_dir($dir)) {
            mkdir($dir, 0755, true);
        }

        file_put_contents($path, $contents);

        return realpath($path);
    }

    private function reloadBundlesFile()
    {
        $finder = Finder::create()->in([__DIR__.'/../../src/macros'])
            ->name('*.php')
            ->depth(1);

        $files = collect($finder)
            ->map(function (SplFileInfo $file) {
                $pathname = $file->getRelativePathname();
                list ($ns, $name) = explode(DIRECTORY_SEPARATOR, $pathname);

                return [
                    'ns' => $ns,
                    'name' => pathinfo($name, PATHINFO_FILENAME),
                ];
            })
            ->values()
            ->sort(function ($a, $b) {
                $byNs = strcmp($a['ns'], $b['ns']);
                $byName = strcmp($a['name'], $b['name']);

                return (0 === $byNs) ? $byName : $byNs;
            });

        $contents = $this->view->make('bundle')
            ->with(compact('files'))
            ->render();

        file_put_contents(__DIR__.'/../../src/bundle.php', $contents);
    }
}
