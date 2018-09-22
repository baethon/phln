<?php
declare(strict_types=1);

namespace phln\collection;

const init = '\\phln\\collection\\init';

/**
 * Returns all but the last element of the given array or string.
 *
 * @phlnSignature [a] -> [a]
 * @phlnSignature String -> String
 * @phlnCategory collection
 * @param array|string $collection
 * @return array|string
 * @example
 *      \phln\collection\init([1, 2, 3]); // [1, 2]
 *      \phln\collection\init([1, 2]); // [1]
 *      \phln\collection\init([1]); // []
 *      \phln\collection\init([]); // []
 *
 *      \phln\collection\init('lorem'); // 'lore'
 *      \phln\collection\init('lo'); // 'l'
 *      \phln\collection\init('l'); // ''
 *      \phln\collection\init(''); // ''
 */
function init($collection)
{
    return 𝑓slice(0, -1, $collection);
}
