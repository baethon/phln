<?php

declare(strict_types=1);

namespace Baethon\Phln;

const set = 'Baethon\\Phln\\set';

function set ($targetData, callable $lens, $value)
{
    return over($targetData, $lens, always($value));
}
