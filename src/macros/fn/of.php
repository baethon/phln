<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;

/**
 * Returns a singleton array containing the value provided.
 *
 * @phlnSignature a -> [a]
 * @phlnCategory function
 * @param mixed $value
 * @return array
 * @example
 *      P::of(null); // [null]
 *      P::of('a'); // ['a']
 */
P::macro('of', function ($value): array {
    return [$value];
});
