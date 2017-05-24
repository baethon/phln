<?php
declare(strict_types=1);

namespace phln\string;

use function phln\fn\curry;
use const phln\fn\nil;

const replaceAll = '\\phln\\string\\replaceAll';
const 𝑓replaceAll = '\\phln\\string\\𝑓replaceAll';

/**
 * Replace regex match in a string with a replacement.
 *
 * Note: this will replace all matches.
 *
 * @param string $regexp
 * @param string $replacement
 * @param string $text
 * @return \Closure|string
 * @example
 *      \phln\string\replaceAll('/foo/', 'bar', 'foo foo foo'); // 'bar bar bar'
 */
function replaceAll($regexp = nil, $replacement = nil, $text = nil)
{
    return curry(𝑓replaceAll, $regexp, $replacement, $text);
}

function 𝑓replaceAll(string $regexp, string $replacement, string $text): string
{
    return preg_replace($regexp, $replacement, $text);
}
