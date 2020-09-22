<?php

declare(strict_types=1);

namespace Baethon\Phln;

const clamp = 'Baethon\\Phln\\clamp';

/**
 * @template T
 *
 * @param T $value
 * @param T $min
 * @param T $max
 *
 * @return T
 */
function clamp($value, $min, $max)
{
    return pipe_first($value, [
        _(min, $max),
        _(max, $min),
    ]);
}
