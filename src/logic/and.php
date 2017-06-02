<?php
declare(strict_types=1);

namespace phln\logic;

use const phln\fn\nil;
use function phln\fn\curry;

const ƛand = '\\phln\\logic\\ƛand';
const 𝑓and = '\\phln\\logic\\𝑓and';

/**
 * Returns `true` if both arguments are `true`-thy; `false` otherwise.
 *
 * Sadly `and` keyword is reserved so this function has to be prefixed with `ƛ`
 *
 * @phlnSignature a -> b -> Boolean
 * @phlnCategory logic
 * @param mixed $left
 * @param mixed $right
 * @return \Closure|bool
 * @example
 *      \phln\login\ƛand(true, true); // true
 */
function ƛand($left = nil, $right = nil)
{
    return curry(𝑓and, $left, $right);
}

function 𝑓and($left, $right): bool
{
    return $left && $right;
}
