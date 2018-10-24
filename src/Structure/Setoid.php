<?php
declare(strict_types = 1);

namespace Baethon\Phln\Structure;

interface Setoid
{
    public function equals(Setoid $other): bool;
}
