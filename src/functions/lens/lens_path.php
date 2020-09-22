<?php

declare(strict_types=1);

namespace Baethon\Phln;

const lens_path = 'Baethon\\Phln\\lens_path';

function lens_path (string $path): callable
{
    return lens(
        _(path, $path),
        function ($target, $value) use ($path) {
            return assoc_path($target, $path, $value)
                ->toArray();
        }
    );
}
