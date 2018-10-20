<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;

P::macro('unique', call_user_func(function () {
    $reducer = function ($carry, $item) {
        return in_array($item, $carry, true)
            ? $carry
            : P::append($item, $carry);
    };

    return function (array $list) use ($reducer): array {
        return array_reduce($list, $reducer, []);
    };
}));
