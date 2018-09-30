<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;

P::macro('map', function (callable $fn = null, array $list = []) {
    return array_map($fn, $list);
});
