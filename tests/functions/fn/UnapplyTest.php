<?php

use Baethon\Phln as p;

class UnapplyTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_passes_variadics_as_array_argument()
    {
        $args = [1, 2, 3];
        $result = p\unapply('\\json_encode', ...$args);
        $this->assertEquals(json_encode($args), $result);
    }
}
