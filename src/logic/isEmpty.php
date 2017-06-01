<?php
declare(strict_types=1);

namespace phln\logic;

const isEmpty = '\\phln\\logic\\isEmpty';

/**
 * Returns `true` if the given value is its type's empty value; `false` otherwise.
 *
 * *Note* unlike `\empty()` this function will consider numbers, booleans and NULL as non-empty.
 *
 * @phlnSignature a -> Boolean
 * @phlnCategory logic
 * @param $value
 * @return bool
 * @example
 *      \phln\logic\isEmpty(''); // true
 *      \phln\logic\isEmpty([]); // true
 *      \phln\logic\isEmpty(new stdClass); // true
 *      \phln\logic\isEmpty(0); // false
 *      \phln\logic\isEmpty(null); // false
 *      \phln\logic\isEmpty(false); // false
 *      \phln\logic\isEmpty(true); // false
 */
function isEmpty($value): bool
{
    switch (gettype($value)) {
        case 'array':
            return [] === $value;
        case 'string':
            return '' === $value;
        case 'object':
            return [] === (array) $value;
        default:
            return false;
    }
}
