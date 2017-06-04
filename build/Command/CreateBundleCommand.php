<?php
declare(strict_types=1);

namespace Phln\Build\Command;

use Illuminate\Console\Command;
use Illuminate\View\Factory;
use const phln\collection\last;
use function phln\collection\pluck;
use function phln\collection\join;
use const phln\fn\nil;
use const phln\fn\T;
use const phln\object\keys;
use function phln\collection\filter;
use function phln\collection\map;
use function phln\collection\reject;
use function phln\fn\compose;
use function phln\fn\pipe;
use function phln\object\prop;
use function phln\string\match;
use function phln\string\replaceAll;
use function phln\string\split;

class CreateBundleCommand extends Command
{
    protected $signature = 'create:bundle';

    private $filters = [];

    /**
     * @var Factory
     */
    private $view;

    private $destFile = __DIR__.'/../../dist/phln.php';

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
        file_put_contents($this->destFile, $this->renderClass($functions, $constants));

        $this->output->writeln('Done');
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
                'name' => compose(last, split('\\'))($reflection->getName()),
                'fqn' => $reflection->getName(),
                'parameters' => $this->getParametersSource($parameters),
                'returnType' => $reflection->hasReturnType() ? sprintf(': %s', $reflection->getReturnType()) : '',
                'doc' => $this->getFunctionDocumentation($reflection),
            ];
        };

        $f = pipe(
            compose(prop('user'), '\\get_defined_functions'),
            $this->filters['phln_all'],
            $this->filters['phln_noncurried'],
            map($getName)
        );

        return $f();
    }

    private function getConstants(): array
    {
        $f = pipe(
            compose(keys, prop('user'), '\\get_defined_constants', T),
            $this->filters['phln_all'],
            $this->filters['phln_noncurried'],
            map(function ($constName) {
                return [
                    'fqn' => $constName,
                    'name' => compose(last, split('\\'))($constName),
                ];
            })
        );

        return $f();
    }

    /**
     * @param \ReflectionParameter[] $parameters
     * @return array
     */
    private function getParametersSource(array $parameters): array
    {
        $mapParameters = function (\ReflectionParameter $parameter) {
            $data = ['name' => $parameter->getName()];

            try {
                $data['defaultValue'] = $parameter->getDefaultValue();
            } catch (\ReflectionException $e) {
            }

            return $data;
        };

        $mappedParams = map($mapParameters, $parameters);
        $definition = $this->getParametersDefinition($mappedParams);
        $invoke = $this->getParametersInvokeDefinition($mappedParams);

        return compact('definition', 'invoke');
    }

    private function getParametersDefinition(array $parameters)
    {
        $toSrc = function ($param) {
            if (true === array_key_exists('defaultValue', $param)) {
                $defaultValue = $param['defaultValue'];
                return sprintf(
                    '$%s = %s',
                    $param['name'],
                    ($defaultValue === nil) ? 'nil' : var_export($defaultValue, true)
                );
            }

            return sprintf('$%s', $param['name']);
        };

        return pipe(
            map($toSrc),
            join(', ')
        )($parameters);
    }

    private function getParametersInvokeDefinition(array $parameters)
    {
        return pipe(
            pluck('name'),
            map(function ($name) {
                return sprintf('$%s', $name);
            }),
            join(', ')
        )($parameters);
    }

    private function getFunctionDocumentation(\ReflectionFunction $function): string
    {
        $getDoc = pipe(
            [$function, 'getDocComment'],
            replaceAll('/^/m', '    '),
            replaceAll('/\\\\phln\\\\\w+\\\\(\w+)(\()?/', 'p::$1$2'),
            replaceAll('/phln\\\\\w+\\\\(\w+)/', 'p::$1')
        );

        return $getDoc();
    }
}
