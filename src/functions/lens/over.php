<?php

declare(strict_types=1);

namespace Baethon\Phln;

use Baethon\Phln\Monad\Identity;

const over = 'Baethon\\Phln\\over';

function over ($targetData, callable $lens, callable $fn)
{
    return $lens(
        $targetData,
        function ($value) use ($fn) {
            return Identity::of($fn($value));
        }
    )->extract();
}
