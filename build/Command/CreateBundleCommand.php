<?php
declare(strict_types=1);

namespace Phln\Build\Command;

use Illuminate\Console\Command;
use Illuminate\View\Factory;
use Symfony\Component\Process\ProcessBuilder;
use const phln\collection\last;
use const phln\fn\T;
use const phln\object\keys;
use const phln\relation\𝑓equals;
use function phln\collection\{
    filter, join, map, reject
};
use function phln\fn\{
    always, compose, partial, pipe
};
use function phln\logic\cond;
use function phln\object\prop;
use function phln\relation\equals;
use function phln\string\{
    match, replace, split
};

class CreateBundleCommand extends Command
{
    protected $signature = 'create:bundle';

    private $filters = [];

    /**
     * @var Factory
     */
    private $view;

    private $destFile = __DIR__.'/../../src/Phln.php';

    public function __construct(Factory $view)
    {
        parent::__construct();

        $this->view = $view;
        $this->filters = [
            'phln_all' => filter(match('#^phln\\\\#u')),
            'phln_noncurried' => reject(match('#phln\\\\\w+\\\\𝑓\w+#u')),
        ];
    }

    public function handle()
    {
        $this->output->writeln('Building bundle');

        $this->output->writeln('Collecting functions and constants');
        $functions = $this->getFunctions();
        $constants = $this->getConstants();

        $this->output->writeln('Rendering..');

        try {
            $this->saveFile($functions, $constants);
            $this->output->writeln('Done');
        } catch (\Exception $e) {
            $this->output->writeln('<error>Failed to create bundle</error>');
            $this->output->writeln($e->getMessage());
        }
    }

    private function getReturnTypeSource(\ReflectionFunction $function): string
    {
        $reflectionType = $function->getReturnType();

        if (true === is_null($reflectionType)) {
            return $this->getReturnTypeFromDocBlock($function);
        }

        return sprintf(
            '%s%s',
            $reflectionType->isBuiltin() ? '' : '\\',
            $reflectionType
        );
    }

    private function getReturnTypeFromDocBlock(\ReflectionFunction $function): string
    {
        $docBlock = $function->getDocComment();
        $matched = match('/@return (\S+)/', $docBlock);

        return $matched ?? 'mixed';
    }

    private function saveFile(array $functions, array $constants)
    {
        $tmpFile = $this->destFile.'.tmp';

        file_put_contents($tmpFile, $this->renderClass($functions, $constants));

        try {
            $this->validateGeneratedSources($tmpFile);
            rename($tmpFile, $this->destFile);
        } finally {
            if (file_exists($tmpFile)) {
                unlink($tmpFile);
            }
        }
    }

    private function validateGeneratedSources(string $filePath)
    {
        ProcessBuilder::create(['php', '-l', realpath($filePath)])
            ->getProcess()
            ->mustRun();
    }

    private function renderClass(array $functions, array $constants)
    {
        return $this->view->make('phln-class')
            ->with(compact('functions', 'constants'))
            ->render();
    }

    private function getFunctions(): array
    {
        $getName = function (callable $fn) {
            $reflection = new \ReflectionFunction($fn);
            $parameters = $reflection->getParameters();

            return [
                'name' => compose([last, split('\\')])($reflection->getName()),
                'fqn' => $reflection->getName(),
                'parameters' => $this->getParametersSource($parameters),
                'returnType' => $this->getReturnTypeSource($reflection),
                'doc' => $reflection->getDocComment(),
            ];
        };

        $f = pipe([
            compose([prop('user'), '\\get_defined_functions']),
            $this->filters['phln_all'],
            $this->filters['phln_noncurried'],
            map($getName),
            reject(compose([
                match('/@internal/'),
                prop('doc'),
            ]))
        ]);

        return $f();
    }

    private function getConstants(): array
    {
        $f = pipe([
            compose([keys, prop('user'), '\\get_defined_constants', T]),
            $this->filters['phln_all'],
            $this->filters['phln_noncurried'],
            map(function ($constName) {
                return [
                    'fqn' => $constName,
                    'name' => compose([last, split('\\')])($constName),
                ];
            }),
        ]);

        return $f();
    }

    /**
     * @param \ReflectionParameter[] $parameters
     * @return array
     */
    private function getParametersSource(array $parameters): array
    {
        $mapParameters = function (\ReflectionParameter $parameter) {
            $data = [
                'name' => $parameter->getName(),
                'variadic' => $parameter->isVariadic(),
                'type' => $parameter->getType(),
            ];

            try {
                $data['defaultValue'] = $parameter->getDefaultValue();
            } catch (\ReflectionException $e) {
            }

            return $data;
        };

        $mappedParams = map($mapParameters, $parameters);
        $definition = $this->getParametersDefinition($mappedParams);

        return compact('definition');
    }

    private function getParametersDefinition(array $parameters)
    {
        $exportDefaultValue = cond([
            [equals([]), always('[]')],
            [T, function ($value) {
                return var_export($value, true);
            }],
        ]);

        $toSrc = function ($param) use ($exportDefaultValue) {
            $base = sprintf(
                '%s%s$%s',
                empty($param['type']) ? '' : "{$param['type']} ",
                $param['variadic'] ? '...' : '',
                $param['name']
            );

            if (true === array_key_exists('defaultValue', $param)) {
                $defaultValue = $param['defaultValue'];
                $base .= sprintf(' = %s', $exportDefaultValue($defaultValue));
            }

            return $base;
        };

        return pipe([
            map($toSrc),
            join(', '),
        ])($parameters);
    }
}
