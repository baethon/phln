<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;

P::macro('mapIndexed', function (callable $fn, array $list): array {
    $keys = array_keys($list);
    $mapped = array_map($fn, $list, $keys);

    return array_combine($keys, $mapped);
});
