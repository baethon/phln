<?php

use Baethon\Phln as p;

class PipeFirstTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_composes_functions()
    {
        $inc = function ($i) {
            return $i + 1;
        };

        $result = p\pipe_first(1, [
            $inc,
            $inc
        ]);

        $this->assertEquals(3, $result);
    }
}
