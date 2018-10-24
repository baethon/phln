<?php
declare(strict_types = 1);

namespace Baethon\Phln\Structure;

interface Apply extends Functor
{
    public function ap(Apply $a);
}
