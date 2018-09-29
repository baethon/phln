<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;
use function Baethon\Phln\assertObject;

P::macro('values', function ($object): array {
    assertObject($object);

    return array_values((array) $object);
});

