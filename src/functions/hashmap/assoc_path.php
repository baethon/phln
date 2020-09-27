<?php

declare(strict_types=1);

namespace Baethon\Phln;

const assoc_path = 'Baethon\\Phln\\assoc_path';

/**
 * @param array<mixed>|object $object
 * @param mixed               $value
 * @return array<string, mixed>
 */
function assoc_path($object, string $path, $value): array
{
    /** @var Zipper */
    $zipper = reduce(
        explode('.', $path),
        function (Zipper $zipper, $key) {
            return $zipper->down($key);
        },
        Zipper::of($object)
    );

    return $zipper->update($value)
        ->root()
        ->current();
}
