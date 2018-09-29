<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;

P::curried('pluck', 2, function ($key, array $list): array {
    return P::map(P::prop($key), $list);
});
