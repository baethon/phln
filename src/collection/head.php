<?php
declare(strict_types=1);

namespace phln\collection;

use const phln\fn\otherwise;
use function phln\fn\{
    always, compose, throwException
};
use function phln\logic\cond;
use function phln\relation\lt;
use function phln\type\typeCond;

const head = '\\phln\\collection\\head';

/**
 * Returns the first element of a given list or string
 *
 * @phlnSignature [a] -> a | Null
 * @phlnSignature String -> String
 * @phlnCategory collection
 * @param array $collection
 * @return mixed|null
 * @example
 *      \phln\collection\head([1, 2, 3]); // 1
 *      \phln\collection\head([]); // null
 *      \phln\collection\head('foo'); // 'f'
 *      \phln\collection\head('f'); // ''
 */
function head($collection)
{
    $sliceFirst = slice(0, 1);
    $moreThanOne = compose([lt(1), length]);
    $headOfArray = cond([
        [$moreThanOne, compose(['\\current', $sliceFirst])],
        [otherwise, always(null)],
    ]);
    $headOfString = cond([
        [$moreThanOne, $sliceFirst],
        [otherwise, always('')],
    ]);

    $f = typeCond([
        ['array', $headOfArray],
        ['string', $headOfString],
        [otherwise, throwException(\InvalidArgumentException::class)],
    ]);

    return $f($collection);
}
