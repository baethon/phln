<?php
declare(strict_types=1);

namespace phln\collection;

use function phln\type\typeCond;
const tail = '\\phln\\collection\\tail';

/**
 * Returns all but the first element of the given array or string
 *
 * @phlnSignature [a] -> [a]
 * @phlnSignature String -> String
 * @phlnCategory collection
 * @param array $collection
 * @return array
 * @example
 *      \phln\collection\tail([1, 2, 3]); // [2, 3]
 *      \phln\collection\tail([1]); // []
 *      \phln\collection\tail([]); // []
 *      \phln\collection\tail('lorem'); // 'orem'
 *      \phln\collection\tail('l'); // ''
 *      \phln\collection\tail(''); // ''
 */
function tail($collection)
{
    return 𝑓slice(1, length($collection), $collection);
}
