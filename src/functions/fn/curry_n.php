<?php

declare(strict_types=1);

namespace baethon\phln;

use Baethon\Phln\CurriedFn;

const curry_n = 'baethon\\phln\\curry_n';

/**
 * Curry given funciton of N-arity
 *
 * @param int $arity
 * @param callable $fn
 * @param array $args
 * @return CurriedFn|mixed
 */
function curry_n (int $arity, callable $fn, array $args = []) {
    return CurriedFn::ofN($arity, $fn)(...$args);
}
