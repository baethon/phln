<?php

declare(strict_types=1);

namespace Baethon\Phln;

const binary = 'Baethon\\Phln\\binary';

/**
 * Wraps a function of any arity (including nullary) in a function that accepts exactly 2 parameters. Any extraneous parameters will not be passed to the supplied function.
 */
function binary(callable $fn): callable
{
    return n_ary(2, $fn);
}
