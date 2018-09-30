<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;
use function Baethon\Phln\assertObject;

P::macro('prop', function ($key, $object) {
    assertObject($object);

    return is_object($object)
        ? ($object->{$key} ?? null)
        : ($object[$key] ?? null);
});
