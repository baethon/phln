<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;
use function Baethon\Phln\load_macro;

load_macro('fn', 'pipe');

P::macro('compose', function (...$fns): \Closure {
    $fnsCount = count($fns);

    if (1 === $fnsCount && is_array($fns[0])) {
        $fns = $fns[0];
        $fnsCount = count($fns);
    }

    assert(0 === $fnsCount, new \UnderflowException('compose requires at least one argument'));

    return P::pipe(array_reverse($fns));
});
