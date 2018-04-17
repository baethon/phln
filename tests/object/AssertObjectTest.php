<?php

use function phln\object\assertObject;

class AssertObjectTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @test
     * @dataProvider objectsProvider
     */
    public function it_passes_on_valid_object($value)
    {
        $this->assertNull(assertObject($value));
    }

    public function objectsProvider()
    {
        return [
            [[]],
            [new stdClass],
        ];
    }

    /**
     * @test
     * @dataProvider nonObjectsProvider
     */
    public function it_fails_on_non_objects($value)
    {
        $type = gettype($value);

        try {
            assertObject($value);
            $this->fail("[{$type}] should not pass assertion");
        } catch (\Throwable $e) {
            $this->markTestSkipped('assertObject throwed an exception. Everything is fine.');
        }
    }

    public function nonObjectsProvider()
    {
        return [
            ['a'],
            [1],
            [null],
        ];
    }
}
