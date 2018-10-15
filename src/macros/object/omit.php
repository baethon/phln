<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;
use function Baethon\Phln\assert_object;

P::macro('omit', function (array $omitKeys, $object): array {
    assert_object($object);

    return array_diff_key((array) $object, array_combine($omitKeys, $omitKeys));
});
