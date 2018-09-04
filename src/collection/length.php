<?php
declare(strict_types=1);

namespace phln\collection;

use function phln\type\is;
use function phln\logic\cond;
use function phln\fn\throwException;
use function phln\fn\𝑓apply as apply;

use const phln\fn\otherwise;

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
    return apply(
        cond([
            ['\\is_countable', '\\count'],
            [is('string'), '\\mb_strlen'],
            [otherwise, throwException(
                \InvalidArgumentException::class,
                ['Unable to return length of given collection']
            )],
        ]),
        [$collection]
    );
}
