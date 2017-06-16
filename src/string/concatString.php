<?php
declare(strict_types=1);

namespace phln\string;

use const phln\fn\nil;
use function phln\fn\curryN;

const concatString = '\\phln\\string\\concatString';
const 𝑓concatString = '\\phln\\string\\𝑓concatString';

/**
 * Returns the result of concatenating the given strings.
 *
 * @phlnSignature String -> String -> String
 * @phlnCategory string
 * @param string $a
 * @param string $b
 * @return \Closure|string
 * @example
 *      \phln\string\concatString('a', 'B'); // aB
 */
function concatString($a = nil, $b = nil)
{
    return curryN(2, 𝑓concatString, [$a, $b]);
}

function 𝑓concatString(string $a, string $b): string
{
    return "{$a}{$b}";
}
