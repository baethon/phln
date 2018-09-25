<?php
declare(strict_types=1);

namespace Baethon\Phln;

use Spatie\Macroable\Macroable;

final class Phln
{
    use Macroable;

    const __ = '_phln_fn_partial_placeholder';

    /**
     * Adds curried macro
     *
     * @param string $macroName
     * @param int $arity
     * @param callable $fn
     */
    public static function curried(string $macroName, int $arity, callable $fn)
    {
        static::macro($macroName, static::curryN($arity, $fn));
    }

    /**
     * Makes an alias for given macro
     *
     * @param string $macroName
     * @param string $targetMacro
     */
    public static function alias(string $macroName, string $targetMacro)
    {
        static::macro($macroName, static::class."::{$targetMacro}");
    }

    /**
     * Returns "reference" to one of Phln macros
     *
     * @param string $macroName
     * @return callable
     */
    public static function ref(string $macroName): callable
    {
        return sprintf('%s::%s', static::class, $macroName);
    }
}
