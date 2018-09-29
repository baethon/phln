<?php

use Baethon\Phln\Phln as P;

class UniqueTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_returns_unique_elements()
    {
        $this->assertEquals([1, 3, 2], P::unique([1, 3, 3, 2, 1, 1]));
        $this->assertEquals([1, '1'], P::unique([1, '1', 1]));
        $this->assertEquals([[42]], P::unique([[42], [42]]));
    }
}
