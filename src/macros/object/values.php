<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;
use function Baethon\Phln\assert_object;

P::macro('values', function ($object): array {
    assert_object($object);

    return array_values((array) $object);
});
