<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;
use function Baethon\Phln\assertObject;

P::macro('omit', function (array $omitKeys, $object): array {
    assertObject($object);

    return array_diff_key((array) $object, array_combine($omitKeys, $omitKeys));
});
