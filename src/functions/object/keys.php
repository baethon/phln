<?php

declare(strict_types=1);

use Baethon\Phln\Phln as P;

use function Baethon\Phln\assert_object;

P::macro('keys', function ($object): array {
    assert_object($object);

    $value = is_object($object)
        ? get_object_vars($object)
        : $object;

    return array_keys($value);
});
