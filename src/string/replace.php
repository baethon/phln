<?php
declare(strict_types=1);

namespace phln\string;

use function phln\fn\curry;
use const phln\fn\nil;

const replace = '\\phln\\string\\𝑓replace';

/**
 * Replace a regex match in a string with a replacement.
 *
 * Note: this function replaces only first matching string.
 * To replace all matches `replaceAll()` should be used.
 *
 * @phlnSignature RegExp -> String -> String -> String
 * @phlnCategory string
 * @param string $regexp
 * @param string $replacement
 * @param string $text
 * @return \Closure|string
 * @example
 *      \phln\string\replace('/foo/', 'bar', 'foo foo foo'); // 'bar foo foo'
 */
function replace($regexp = nil, $replacement = nil, $text = nil)
{
    return curry(replace, $regexp, $replacement, $text);
}

function 𝑓replace(string $regexp, string $replacement, string $text): string
{
    return preg_replace($regexp, $replacement, $text, 1);
}
