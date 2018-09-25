<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;

/**
 * A function that does nothing but return the parameter supplied to it. Good as a default or placeholder function.
 *
 * @phlnSignature a -> a
 * @phlnCategory function
 * @param $value
 * @return mixed
 * @example
 *      P::identity(1) === 1; // 'true'
 */
P::macro('identity', function ($value) {
    return $value;
});
