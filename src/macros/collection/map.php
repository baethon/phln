<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;

P::curried('map', 2, function (callable $fn = null, array $list = []) {
    return array_map($fn, $list);
});
