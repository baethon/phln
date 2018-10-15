<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;
use function Baethon\Phln\assert_object;

P::macro('prop', function ($key, $object) {
    assert_object($object);

    return is_object($object)
        ? ($object->{$key} ?? null)
        : ($object[$key] ?? null);
});
