<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;

P::macro('lens', function (callable $getter, callable $setter) {
    return P::curryN(2, function (callable $toFunctorFn, $target) use ($getter, $setter) {
        return P::map(
            function ($focus) use ($target, $setter) {
                return $setter($focus, $target);
            },
            $toFunctorFn($getter($target))
        );
    });
});
