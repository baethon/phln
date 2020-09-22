<?php

declare(strict_types=1);

namespace Baethon\Phln;

const regexp = 'Baethon\\Phln\\regexp';

function regexp(string $regexp): RegExp
{
    return RegExp::fromString($regexp);
}
