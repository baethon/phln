<?php
declare(strict_types=1);

namespace phln\collection;

use const phln\fn\otherwise;
use const phln\logic\isEmpty;
use function phln\fn\{
    always, pipe, throwException
};
use function phln\logic\ifElse;
use function phln\type\typeCond;

const last = '\\phln\\collection\\last';

/**
 * Returns the last element of the given list or string.
 *
 * @phlnSignature [a] -> a
 * @phlnSignature String -> String
 * @phlnCategory collection
 * @param array|string $list
 * @return mixed|null
 * @example
 *      \phln\collection\last([1, 2, 3]); // 3
 *      \phln\collection\last([]); // null
 *      \phln\collection\last('foo'); // 'o'
 *      \phln\collection\last('f'); // 'f'
 */
function last($list)
{
    $lastElement = slice(-1, 1);
    $lastOfArray = pipe([
        $lastElement,
        ifElse(isEmpty, always(null), '\\current'),
    ]);

    $f = typeCond([
        ['array', $lastOfArray],
        ['string', $lastElement],
        [otherwise, throwException(\InvalidArgumentException::class)],
    ]);

    return $f($list);
}
