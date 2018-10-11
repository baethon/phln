<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;
use function Baethon\Phln\assertObject;

P::macro('keys', function ($object): array {
    assertObject($object);

    $value = is_object($object)
        ? get_object_vars($object)
        : $object;

    return array_keys($value);
});
