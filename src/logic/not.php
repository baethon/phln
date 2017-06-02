<?php
declare(strict_types=1);

namespace phln\logic;

const not = '\\phln\\logic\\not';

/**
 * A function that returns the `!` of its argument. It will return `true` when passed false-y value, and `false` when passed a truth-y one.
 *
 * @phlnSignature * -> Boolean
 * @phlnCategory logic
 * @param $value
 * @return bool
 * @example
 *      \phln\logic\not(0); // true
 *      \phln\logic\not(true); // false
 */
function not($value): bool
{
    return !$value;
}
