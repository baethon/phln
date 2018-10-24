<?php
declare(strict_types = 1);

namespace Baethon\Phln\Structure;

interface Chain extends Apply
{
    public function chain(callable $fn);
}
