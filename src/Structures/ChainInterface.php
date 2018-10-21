<?php
declare(strict_types = 1);

namespace Baethon\Phln\Structures;

interface ChainInterface extends ApplyInterface
{
    public function chain(callable $fn);
}
