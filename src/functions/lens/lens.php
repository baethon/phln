<?php

declare(strict_types=1);

namespace Baethon\Phln;

const lens = 'Baethon\\Phln\\lens';

function lens(callable $getter, callable $setter): callable
{
    return curry_n(2, function ($target, callable $toFunctorFn) use ($getter, $setter) {
        return map(
            $toFunctorFn($getter($target)),
            function ($focus) use ($target, $setter) {
                return $setter($target, $focus);
            }
        );
    });
}
