<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;

P::macro('compose', function (array $fns): \Closure {
    if (0 === count($fns)) {
        throw new \UnderflowException('compose requires at least one argument');
    }

    return P::pipe(array_reverse($fns));
});
