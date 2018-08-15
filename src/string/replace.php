<?php
declare(strict_types=1);

namespace phln\string;

use phln\RegExp;
use const phln\fn\nil;
use function phln\fn\curryN;

const replace = '\\phln\\string\\replace';
const 𝑓replace = '\\phln\\string\\𝑓replace';

/**
 * Replace a regex match in a string with a replacement.
 *
 * When regular expression has 'global' modifier all matching strings will be replaced.
 * Otherwise only first matching string will be replaced.
 *
 * @phlnSignature RegExp -> String -> String -> String
 * @phlnCategory string
 * @param string|RegExp $regexp
 * @param string $replacement
 * @param string $text
 * @return \Closure|string
 * @example
 *      \phln\string\replace('/foo/', 'bar', 'foo foo foo'); // 'bar foo foo'
 *      \phln\string\replace('/foo/g', 'bar', 'foo foo foo'); // 'bar bar bar'
 */
function replace($regexp = null, string $replacement = '', string $text = '')
{
    return curryN(3, 𝑓replace, func_get_args());
}

function 𝑓replace($regexp, string $replacement, string $text): string
{
    $r = RegExp::of($regexp);
    $limit = $r->isGlobal() ? -1 : 1;

    return preg_replace((string) $r, $replacement, $text, $limit);
}
