<?php
declare(strict_types=1);

namespace Baethon\Phln;

final class Phln
{
    const __ = '_phln_fn_partial_placeholder';

    /**
     * @var \Closure[] $macros
     */
    protected static array $macros = [];

    private function __construct()
    {
    }

    /**
     * Makes an alias for given macro
     *
     * @param string $macroName
     * @param string $targetMacro
     * @return void
     */
    public static function alias(string $macroName, string $targetMacro): void
    {
        static::macro($macroName, static::raw($targetMacro));
    }

    /**
     * Returns "reference" to one of Phln macros or methods
     *
     * @param string $macroName
     * @return \Closure
     */
    public static function raw(string $macroName): \Closure
    {
        if (static::hasMacro($macroName)) {
            return static::$macros[$macroName];
        }

        /** @var callable $callable */
        $callable = sprintf('%s::%s', static::class, $macroName);

        return \Closure::fromCallable($callable);
    }

    public static function arity(callable $fn): int
    {
        return ($fn instanceof FixedArityInterface)
            ? $fn->getArity()
            : (new \ReflectionFunction($fn))->getNumberOfParameters();
    }

    /**
     * @param callable $fn
     * @param array<int, mixed> $args
     * @return CurriedFn|mixed
     */
    public static function curry(callable $fn, array $args = [])
    {
        return CurriedFn::of($fn)(...$args);
    }

    /**
     * @param int $n
     * @param callable $fn
     * @param array<int, mixed> $args
     * @return CurriedFn|mixed
     */
    public static function curryN(int $n, callable $fn, array $args = [])
    {
        return CurriedFn::ofN($n, $fn)(...$args);
    }

    public static function macro(string $name, callable $macro): void
    {
        static::$macros[$name] = \Closure::fromCallable($macro);
    }

    public static function hasMacro(string $name): bool
    {
        return isset(static::$macros[$name]);
    }

    /**
     * @param string $method
     * @param mixed[] $parameters
     * @return mixed
     */
    public static function __callStatic($method, $parameters)
    {
        if (! static::hasMacro($method)) {
            throw new \BadMethodCallException("Method {$method} does not exist.");
        }

        return static::curry(static::$macros[$method], $parameters);
    }
}
