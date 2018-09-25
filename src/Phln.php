<?php
declare(strict_types=1);

namespace Baethon\Phln;

use Spatie\Macroable\Macroable;

final class Phln
{
    use Macroable;

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
}
