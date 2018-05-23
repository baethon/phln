<?php
declare(strict_types=1);

namespace phln\string;

use phln\RegExp;
use function phln\fn\curryN;
use function phln\type\𝑓is;

const split = '\\phln\\string\\split';
const 𝑓split = '\\phln\\string\\𝑓split';

/**
 * Splits a string into an array of strings based on the given regular expression or separator.
 *
 * It's possible to split string
 *
 * @phlnSignature String -> String -> [String]
 * @phlnSignature RegExp -> String -> [String]
 * @phlnCategory string
 * @param string|RegExp $delimiter
 * @param string $text
 * @return \Closure|array
 * @example
 *      \phln\string\split('/', 'a/b'); // ['a', 'b']
 */
function split($delimiter = null, string $text = '')
{
    return curryN(2, 𝑓split, func_get_args());
}

function 𝑓split($delimiter, string $text): array
{
    $r = 𝑓is(RegExp::class, $delimiter) ? $delimiter : RegExp::fromString($delimiter);

    return preg_split((string) $r, $text);
}