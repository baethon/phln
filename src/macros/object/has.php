<?php

declare(strict_types=1);

use Baethon\Phln\Phln as P;

use function Baethon\Phln\assert_object;

P::macro('has', function (string $prop, $object) {
    assert_object($object);

    return is_object($object)
        ? property_exists($object, $prop)
        : array_key_exists($prop, $object);
});
