<?php
declare(strict_types=1);

namespace phln\string;

use function phln\fn\curry;
use const phln\fn\nil;

const concatString = '\\phln\\string\\𝑓concatString';

/**
 * Returns the result of concatenating the given strings.
 *
 * @phlnSignature String -> String -> String
 * @phlnCategory string
 * @param string $a
 * @param string $b
 * @return \Closure|mixed
 * @example
 *      \phln\string\concatString('a', 'B'); // aB
 */
function concatString($a = nil, $b = nil)
{
    return curry(concatString, $a, $b);
}

function 𝑓concatString(string $a, string $b): string
{
    return "{$a}{$b}";
}
