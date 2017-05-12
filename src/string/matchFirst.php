<?php
declare(strict_types=1);

namespace phln\string;

use const phln\collection\head;
use function phln\fn\curry;
use const phln\fn\nil;
use function phln\fn\pipe;

const matchFirst = '\\phln\\string\\𝑓matchFirst';

/**
 * Tests a regular expression against a String.
 *
 * Unlike `match()` this function will return first matching string or `null` when there is no match.
 *
 * @phlnSignature RegExp -> String -> String|Null
 * @phlnCategory string
 * @param string $regexp
 * @param string $test
 * @return \Closure|mixed
 * @example
 *      \phln\string\matchFirst('/([a-z](o))/i', 'Lorem ipsum dolor'); // 'Lo'
 */
function matchFirst($regexp = nil, $test = nil)
{
    return curry(matchFirst, $regexp, $test);
}

function 𝑓matchFirst(string $regexp, string $test)
{
    return pipe(match, head)($regexp, $test);
}
