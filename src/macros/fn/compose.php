<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;
use function Baethon\Phln\load_macro;

load_macro('fn', 'pipe');

P::macro('compose', function (array $fns): \Closure {
    if (0 === count($fns)) {
        throw new \UnderflowException('compose requires at least one argument');
    }

    return P::pipe(array_reverse($fns));
});
