<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;

P::macro('pluck', function ($key, array $list): array {
    return P::map(P::prop($key), $list);
});
