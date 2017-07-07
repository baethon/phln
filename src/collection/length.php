<?php
declare(strict_types=1);

namespace phln\collection;

use const phln\fn\otherwise;
use function phln\fn\throwException;
use function phln\type\typeCond;

const length = '\\phln\\collection\\length';

/**
 * Returns the number of elements in the array or string
 *
 * @phlnSignature [a] -> Number
 * @phlnSignature String -> Number
 * @phlnCategory collection
 * @param string|array $collection
 * @return int
 * @example
 *      \phln\collection\length('lorem'); // 5
 */
function length($collection): int
{
    $f = typeCond([
        ['array', '\\count'],
        ['string', '\\mb_strlen'],
        [otherwise, throwException(\InvalidArgumentException::class)],
    ]);

    return $f($collection);
}
