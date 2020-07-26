<?php

declare(strict_types=1);

use Baethon\Phln\Phln as P;
use Baethon\Phln\Monad\Identity;

P::macro('over', function (callable $lens, callable $fn, $targetData) {
    return $lens(
        function ($value) use ($fn) {
            return Identity::of($fn($value));
        },
        $targetData
    )->extract();
});
