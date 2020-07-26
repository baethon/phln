<?php

declare(strict_types=1);

use Baethon\Phln\Phln as P;

use function Baethon\Phln\assert_object;

P::macro('pick', function (array $useKeys, $object): array {
    assert_object($object);
    return array_intersect_key((array) $object, array_combine($useKeys, $useKeys) ?: []);
});
