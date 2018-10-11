<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;
use function Baethon\Phln\assertObject;

P::macro('pick', function (array $useKeys, $object): array {
    assertObject($object);
    return array_intersect_key((array) $object, array_combine($useKeys, $useKeys));
});
