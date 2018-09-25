<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;

/**
 * A function that always returns `false`. Any passed in parameters are ignored.
 *
 * @phlnSignature * -> Boolean
 * @phlnCategory function
 * @return bool
 */
P::macro('F', function (): bool {
    return false;
});

