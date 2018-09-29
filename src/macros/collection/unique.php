<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;

P::macro('unique', function (array $list): array {
    $reducer = function ($carry, $item) {
        return in_array($item, $carry, true) ? $carry : P::append($item, $carry);
    };

    return array_reduce($list, $reducer, []);
});
