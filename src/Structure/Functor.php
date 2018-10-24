<?php
declare(strict_types = 1);

namespace Baethon\Phln\Structure;

interface Functor
{
    public function map(callable $fn);
}
