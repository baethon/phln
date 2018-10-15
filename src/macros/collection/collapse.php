<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;

P::macro('collapse', function (array $list): array {
    return array_reduce(
        $list,
        function ($carry, $item) {
            return is_array($item)
                ? array_merge($carry, $item)
                : P::append($item, $carry);
        },
        []
    );
});
