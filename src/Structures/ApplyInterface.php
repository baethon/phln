<?php
declare(strict_types = 1);

namespace Baethon\Phln\Structures;

interface ApplyInterface extends FunctorInterface
{
    public function ap($b);
}
