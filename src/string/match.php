<?php
declare(strict_types=1);

namespace phln\string;

use const phln\collection\head;
use function phln\fn\curry;
use const phln\fn\nil;
use function phln\fn\compose;

const match = '\\phln\\string\\match';
const 𝑓match = '\\phln\\string\\𝑓match';

/**
 * Tests a regular expression against a String.
 *
 * Unlike `matchAll()` this function will return first matching string or `null` when there is no match.
 *
 * @phlnSignature RegExp -> String -> String|Null
 * @phlnCategory string
 * @param string $regexp
 * @param string $test
 * @return \Closure|string
 * @example
 *      \phln\string\matchFirst('/([a-z](o))/i', 'Lorem ipsum dolor'); // 'Lo'
 */
function match($regexp = nil, $test = nil)
{
    return curry(𝑓match, $regexp, $test);
}

function 𝑓match(string $regexp, string $test)
{
    return compose(head, matchAll)($regexp, $test);
}
