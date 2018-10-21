<?php
declare(strict_types = 1);

namespace Baethon\Phln\Structures;

interface FunctorInterface
{
    public function map(callable $fn);
}
