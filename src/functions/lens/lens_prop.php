<?php

declare(strict_types=1);

namespace Baethon\Phln;

const lens_prop = 'Baethon\\Phln\\lens_prop';

function lens_prop(string $prop): callable
{
    return lens(
        _(prop, $prop),
        function ($target, $value) use ($prop) {
            return assoc($target, $prop, $value);
        }
    );
}
