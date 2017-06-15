<?php
declare(strict_types=1);

namespace phln\string;

use phln\RegExp;

const regexp = '\\phln\\string\\regexp';

/**
 * Converts given string to RegExp object
 *
 * @phlnSignature String -> RegExp
 * @phlnCategory string
 * @param string $regexp
 * @return RegExp
 * @example
 *      \phln\string\regexp('/foo/ig'); // => new \phln\RegExp('/foo/', 'ig');
 */
function regexp(string $regexp): RegExp
{
    return RegExp::fromString($regexp);
}
