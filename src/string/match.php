<?php
declare(strict_types=1);

namespace phln\string;

use phln\RegExp;
use function phln\collection\head;
use function phln\fn\curryN;

const match = '\\phln\\string\\match';
const 𝑓match = '\\phln\\string\\𝑓match';

/**
 * Tests a regular expression against a String. Returns found string, or `NULL`. When regular expression has 'global' modifier function will return array of found strings.
 *
 * If regular expression contains groups `match()` will return only matching groups (in an order defined in regular expression).
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
 *      \phln\string\match('/return (\w)/', 'return integer'); // 'integer'
 */
function match($regexp = null, string $test = '')
{
    return curryN(2, 𝑓match, func_get_args());
}

function 𝑓match($regexp, string $test)
{
    $r = RegExp::of($regexp);
    $matches = $r->matchAll($test);

    return $r->isGlobal() ? $matches : head($matches);
}
