<?php
declare(strict_types=1);

namespace phln\string;

use function phln\fn\curry;
use const phln\fn\nil;

const match = '\\phln\\string\\𝑓match';

/**
 * Tests a regular expression against a String. Note that this function will return an empty array when there are no matches.
 *
 * All matching strings will be returned.
 *
 * @phlnSignature RegExp -> String -> [String]
 * @param string $regexp
 * @param string $test
 * @return \Closure|array
 * @example
 *      \phln\string\match('/([a-z](o))/i', 'Lorem ipsum dolor'); // ['Lo', 'do', 'lo']
 */
function match($regexp = nil, $test = nil)
{
    return curry(match, $regexp, $test);
}

function 𝑓match(string $regexp, string $test): array
{
    $matches = [];
    preg_match_all($regexp, $test, $matches);
    return isset($matches[0]) ? $matches[0] : [];
}
