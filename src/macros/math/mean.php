<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;

P::macro('mean', function (array $numbers) {
    return array_sum($numbers) / count($numbers);
});
