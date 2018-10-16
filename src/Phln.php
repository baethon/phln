<?php
declare(strict_types=1);

namespace Baethon\Phln;

final class Phln
{
    const __ = '_phln_fn_partial_placeholder';

    protected static $macros = [];

    private function __construct()
    {
    }

    /**
     * Makes an alias for given macro
     *
     * @param string $macroName
     * @param string $targetMacro
     */
    public static function alias(string $macroName, string $targetMacro)
    {
        static::macro($macroName, static::raw($targetMacro));
    }

    /**
     * Returns "reference" to one of Phln macros or methods
     *
     * @param string $macroName
     * @return callable
     */
    public static function raw(string $macroName): callable
    {
        return static::hasMacro($macroName)
            ? static::$macros[$macroName]
            : sprintf('%s::%s', static::class, $macroName);
    }

    public static function arity(callable $fn): int
    {
        return ($fn instanceof CurriedFn)
            ? $fn->getArity()
            : (new \ReflectionFunction($fn))->getNumberOfParameters();
    }

    public static function curry(callable $fn, array $args = [])
    {
        return CurriedFn::of($fn)(...$args);
    }

    public static function curryN(int $n, callable $fn, array $args = [])
    {
        return CurriedFn::ofN($n, $fn)(...$args);
    }

    public static function macro(string $name, callable $macro)
    {
        static::$macros[$name] = $macro;
    }

    public static function hasMacro(string $name): bool
    {
        return isset(static::$macros[$name]);
    }

    public static function __callStatic($method, $parameters)
    {
        if (! static::hasMacro($method)) {
            throw new \BadMethodCallException("Method {$method} does not exist.");
        }

        return static::curry(static::$macros[$method], $parameters);
    }
}
