<?php
declare(strict_types=1);

namespace phln\string;

use phln\RegExp;
use const phln\fn\nil;
use function phln\fn\curryN;
use function phln\type\𝑓is;
use function phln\collection\head;

const match = '\\phln\\string\\match';
const 𝑓match = '\\phln\\string\\𝑓match';

/**
 * Tests a regular expression against a String. Returns found string, or `NULL`. When regular expression has 'global' modifier function will return array of found strings.
 *
 * @phlnSignature RegExp -> String -> String|Null
 * @phlnSignature RegExp -> String -> [String]
 * @phlnCategory string
 * @param string|RegExp $regexp
 * @param string $test
 * @return \Closure|array|string
 * @example
 *      \phln\string\match('/([a-z](o))/i', 'Lorem ipsum dolor'); // 'Lo'
 *      \phln\string\match('/([a-z](o))/ig', 'Lorem ipsum dolor'); // ['Lo', 'do', 'lo']
 */
function match($regexp = nil, $test = nil)
{
    return curryN(2, 𝑓match, $regexp, $test);
}

function 𝑓match($regexp, string $test)
{
    $r = 𝑓is(RegExp::class, $regexp) ? $regexp : RegExp::fromString($regexp);
    $matches = $r->matchAll($test);

    return $r->isGlobal() ? $matches : head($matches);
}
