<?php
declare(strict_types=1);

namespace phln\string;

use phln\RegExp;

const regexp = '\\phln\\string\\regexp';

/**
 * Wraps given pattern (and modifiers) in `\phln\RegExp` object
 *
 * @phlnSignature (String, String) -> RegExp
 * @phlnCategory string
 * @param string $pattern
 * @param string $modifiers
 * @return RegExp
 * @example
 *      \phln\string\regexp('foo', 'ig'); // => new \phln\RegExp('foo', 'ig');
 */
function regexp(string $pattern, string $modifiers = ''): RegExp
{
    return new RegExp($pattern, $modifiers);
}
