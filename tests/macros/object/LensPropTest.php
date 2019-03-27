<?php

use Baethon\Phln\Phln as P;

class LensPropTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_views_value()
    {
        $lens = P::lensProp('name');

        $this->assertEquals('Jon', P::view($lens, ['name' => 'Jon']));
    }

    public function test_it_calls_fn_over_value()
    {
        $lens = P::lensProp('name');
        $this->assertEquals(['name' => 'Array'], P::over($lens, P::always('Array'), ['name' => '']));
    }

    public function test_it_sets_value()
    {
        $lens = P::lensProp('name');
        $this->assertEquals(['name' => 'Jon'], P::set($lens, 'Jon', ['name' => '']));
    }
}
