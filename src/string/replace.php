<?php
declare(strict_types=1);

namespace phln\string;

use phln\RegExp;
use const phln\fn\nil;
use function phln\fn\curryN;
use function phln\type\𝑓is;

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
 * @param string $regexp
 * @param string $replacement
 * @param string $text
 * @return \Closure|string
 * @example
 *      \phln\string\replace('/foo/', 'bar', 'foo foo foo'); // 'bar foo foo'
 *      \phln\string\replace('/foo/g', 'bar', 'foo foo foo'); // 'bar bar bar'
 */
function replace($regexp = nil, $replacement = nil, $text = nil)
{
    return curryN(3, 𝑓replace, $regexp, $replacement, $text);
}

function 𝑓replace($regexp, string $replacement, string $text): string
{
    $r = 𝑓is(RegExp::class, $regexp) ? $regexp : RegExp::fromString($regexp);
    $limit = $r->isGlobal() ? -1 : 1;

    return preg_replace((string) $r, $replacement, $text, $limit);
}
