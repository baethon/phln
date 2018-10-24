<?php
declare(strict_types = 1);

namespace Baethon\Phln\Structure;

interface Applicative extends Apply
{
    public static function of($value);
}
