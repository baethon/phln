<?php

declare(strict_types=1);

namespace Baethon\Phln;

const path = 'Baethon\\Phln\\path';

/**
 * @param array<mixed>|object $object
 * @param string $path
 * @param mixed $default
 * @return mixed
 */
function path ($object, string $path, $default = null)
{
    return reduce_while(
        explode('.', $path),
        function ($carry, $key) use ($default) {
            if (! ObjectWrapper::isObject($carry)) {
                return ['halt', $default];
            }

            if ($prop = prop($carry, $key)) {
                return ['cont', $prop];
            }

            return ['halt', $default];
        },
        $object
    );
}
