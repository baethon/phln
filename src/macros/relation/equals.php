<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;

P::curried('equals', 2, function ($a, $b): bool {
    return $a === $b;
});
