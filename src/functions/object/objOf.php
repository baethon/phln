<?php

declare(strict_types=1);

use Baethon\Phln\Phln as P;

P::macro('objOf', function (string $key, $value): array {
    return [$key => $value];
});
