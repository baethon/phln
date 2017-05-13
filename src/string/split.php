<?php
declare(strict_types=1);

namespace phln\string;

use function phln\fn\curry;
use const phln\fn\nil;

const split = '\\phln\\string\\𝑓split';

/**
 * Splits a string into an array of strings based on the given separator.
 *
 * @phlnSignature String -> String -> [String]
 * @phlnCategory string
 * @param string $delimiter
 * @param string $text
 * @return \Closure|array
 * @example
 *      \phln\string\split('/', 'a/b'); // ['a', 'b']
 */
function split($delimiter = nil, $text = nil)
{
    return curry(split, $delimiter, $text);
}

function 𝑓split(string $delimiter, string $text): array
{
    return explode($delimiter, $text);
}
