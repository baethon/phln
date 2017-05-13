<?php
declare(strict_types=1);

namespace Phln\Build\Command;

use Illuminate\Console\Command;
use Illuminate\View\Factory;

class CreateFunctionCommand extends Command
{
    protected $signature = 'create:function {ns} {name}';

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

        $this->output->writeln(sprintf(
            'Function created at: <info>%s</info>',
            $this->createFunctionSource($ns, $name)
        ));

        $this->output->writeln(sprintf(
            'Test created at: <info>%s</info>',
            $this->createTestSource($ns, $name)
        ));
    }

    private function createFunctionSource($ns, $name)
    {
        return $this->generateFile('function', 'src', $ns, $name);
    }

    private function createTestSource($ns, $name)
    {
        return $this->generateFile('function-test', 'tests', $ns, $name, ucfirst($name).'Test');
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
}
