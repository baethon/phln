<?php

use function phln\relation\lt;

class LtTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_checks_if_value_is_lesser()
    {
        $this->assertTrue(lt(1, 2));
        $this->assertFalse(lt(2, 2));
        $this->assertFalse(lt(1, -2));
    }

    /** @test */
    public function it_is_curried()
    {
        $f = lt(1);
        $this->assertTrue($f(2));
        $this->assertFalse($f(1));
        $this->assertFalse($f(-1));
    }
}
