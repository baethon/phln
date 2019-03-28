<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;
use function Baethon\Phln\assert_object;

P::macro('assoc', function (string $key, $value, $object) {
    assert_object($object);

    if (is_object($object)) {
        $copy = clone $object;
        $copy->{$key} = $value;

        return $copy;
    }

    return array_merge($object, [$key => $value]);
});
