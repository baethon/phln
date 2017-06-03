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
        $parameterDefaultValue = function ($parameter) {
            if (false === array_key_exists('defaultValue', $parameter)) {
                return '';
            }

            $defaultValue = $parameter['defaultValue'];
            $value = (nil === $defaultValue) ? '\\phln\\fn\\nil' : var_export($defaultValue, true);

            return sprintf(' = %s', $value);
        };
        $parameterName = function ($parameter) {
            return sprintf('$%s', $parameter['name']);
        };

        return $this->view->make('phln-class')
            ->with(compact('functions', 'constants', 'parameterDefaultValue', 'parameterName'))
            ->render();
    }

    private function getFunctions(): array
    {
        $getName = function (callable $fn) {
            $reflection = new \ReflectionFunction($fn);
            $parameters = $reflection->getParameters();
            $mapParameters = function (\ReflectionParameter $parameter) {
                try {
                    $defaultValue = $parameter->getDefaultValue();
                    return sprintf(
                        '$%s = %s',
                        $parameter->getName(),
                        (nil === $defaultValue) ? 'nil' : var_export($defaultValue, true)
                    );
                } catch (\ReflectionException $e) {
                    return sprintf('$%s', $parameter->getName());
                }
            };

            $getParametersDefinition = pipe(
                map($mapParameters),
                join(', ')
            );

            return [
                'name' => compose(last, split('\\'))($reflection->getName()),
                'fqn' => $reflection->getName(),
                'parametersDefinition' => $getParametersDefinition($parameters),
//                'passParameters'
                'returnType' => $reflection->hasReturnType() ? sprintf(': %s', $reflection->getReturnType()) : ''
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
            $this->filters['phln_noncurried']
        );

        return $f();
    }

    /**
     * @param \ReflectionParameter[] $parameters
     * @return string
     */
    private function getParametersDefinition(array $parameters): string
    {
        $mapParameters = function (\ReflectionParameter $parameter) {
            try {
                $defaultValue = $parameter->getDefaultValue();
                return sprintf(
                    '$%s = %s',
                    $parameter->getName(),
                    (nil === $defaultValue) ? 'nil' : var_export($defaultValue, true)
                );
            } catch (\ReflectionException $e) {
                return sprintf('$%s', $parameter->getName());
            }
        };

        $getParametersDefinition = pipe(
            map($mapParameters),
            join(', ')
        );
    }
}
