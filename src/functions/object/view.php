<?php

declare(strict_types=1);

use Baethon\Phln\Phln as P;
use Baethon\Phln\Monad\Constant;

P::macro('view', function (callable $lens, $targetData) {
    return $lens(
        function ($value) {
            return new Constant($value);
        },
        $targetData
    )->extract();
});
