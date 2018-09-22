<?php
declare(strict_types=1);

namespace phln\collection;

use const phln\fn\otherwise;
use function phln\type\typeCond;

const reverse = '\\phln\\collection\\reverse';

/**
 * Returns a new list or string with the elements in reverse order.
 *
 * @phlnSignature [a] -> [a]
 * @phlnSignature String -> String
 * @phlnCategory collection
 * @param array|string $collection
 * @return array|string
 * @see \array_reverse()
 * @see \strrev()
 * @example
 *      \phln\collection\reverse([1, 2, 3]); // [3, 2, 1]
 *      \phln\collection\reverse('foo'); // 'oof'
 */
function reverse($collection)
{
    $f = typeCond([
        ['array', '\\array_reverse'],
        ['string', '\\strrev'],
        [otherwise, \phln\fn\throwException(\InvalidArgumentException::class)],
    ]);

    return $f($collection);
}
