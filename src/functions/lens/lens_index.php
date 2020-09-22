<?php

declare(strict_types=1);

namespace Baethon\Phln;

const lens_index = 'Baethon\\Phln\\lens_index';

function lens_index (int $index): callable
{
    return lens(
        _(nth, $index),
        function ($target, $value) use ($index) {
            return update($target, $index, $value);
        }
    );
}
