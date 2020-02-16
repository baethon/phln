<?php

declare(strict_types=1);

use Baethon\Phln\Phln as P;

P::macro('of', function ($value): array {
    return [$value];
});
