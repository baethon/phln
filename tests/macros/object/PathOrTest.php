<?php

use Baethon\Phln\Phln as P;

class PathOrTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_returns_default_value()
    {
        $this->assertEquals('foo', P::pathOr('a.b.c', 'foo', ['a' => ['b' => 1]]));
    }

    public function test_it_returns_existing_value()
    {
        $this->assertEquals(1, P::pathOr('a.b', 'foo', ['a' => ['b' => 1]]));
    }

    public function test_it_does_not_return_default_for_falsey_values()
    {
        $this->assertEquals(0, P::pathOr('a.b', 'foo', ['a' => ['b' => 0]]));
    }

    public function test_it_is_curried()
    {
        $path = P::pathOr('a.b.c', 'foo');
        $this->assertEquals('foo', $path(['a' => ['b' => 1]]));
    }
}
