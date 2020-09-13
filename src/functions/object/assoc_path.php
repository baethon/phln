<?php

declare(strict_types=1);

namespace Baethon\Phln;

const assoc_path = 'Baethon\\Phln\\assoc_path';

function assoc_path ($object, string $path, $value): ObjectWrapper
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
