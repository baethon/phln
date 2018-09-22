<?php
declare(strict_types=1);

namespace phln\string;

use phln\RegExp;
use function phln\fn\curryN;

const test = '\\phln\\string\\test';
const 𝑓test = '\\phln\\string\\𝑓test';

/**
 * Determines whether a given string matches a given regular expression.
 *
 * @phlnSignature RegExp -> String -> Bool
 * @phlnSignature String -> String -> Bool
 * @phlnCategory string
 * @param string|RegExp $regexp
 * @param string $string
 * @return \Closure|bool
 * @example
 *      \phln\string\test('/foo/', 'foobar'); // true
 */
function test($regexp = null, string $string = null)
{
    return curryN(2, 𝑓test, func_get_args());
}

function 𝑓test($regexp, string $string): bool
{
    return RegExp::of($regexp)->test($string);
}
