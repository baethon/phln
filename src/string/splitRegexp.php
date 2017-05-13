<?php
declare(strict_types=1);

namespace phln\string;

use function phln\fn\curry;
use const phln\fn\nil;

const splitRegexp = '\\phln\\string\\𝑓splitRegexp';

/**
 * Splits a string into an array of strings based on the given regular expression.
 *
 * @phlnSignature RegExp -> String -> [String]
 * @param string $regexp
 * @param string $text
 * @return \Closure|array
 */
function splitRegexp($regexp = nil, $text = nil)
{
    return curry(splitRegexp, $regexp, $text);
}

function 𝑓splitRegexp(string $regexp, string $text): array
{
    return preg_split($regexp, $text);
}
