<?php

declare(strict_types=1);

namespace Baethon\Phln;

const unary = 'Baethon\\Phln\\unary';

/**
 * Wraps a function of any arity (including nullary) in a function that accepts exactly 1 parameter. Any extraneous parameters will not be passed to the supplied function.
 */
function unary(callable $fn): callable
{
    return n_ary(1, $fn);
}
