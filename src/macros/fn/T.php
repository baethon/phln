<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;

/**
 * A function that always returns `true`. Any passed in parameters are ignored.
 *
 * @phlnSignature * -> Boolean
 * @phlnCategory function
 * @return bool
 */
P::macro('T', function (): bool {
    return true;
});

P::alias('otherwise', 'T');

