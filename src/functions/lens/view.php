<?php

declare(strict_types=1);

namespace Baethon\Phln;

use Baethon\Phln\Monad\Constant;

const view = 'Baethon\\Phln\\view';

function view ($targetData, callable $lens)
{
    return $lens(
        $targetData,
        function ($value) {
            return new Constant($value);
        }
    )->extract();
}
