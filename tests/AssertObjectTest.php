<?php

use function Baethon\Phln\assert_object;

class AssertObjectTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider objectsProvider
     */
    public function test_it_passes_on_valid_object($value)
    {
        $this->assertNull(assert_object($value));
    }

    public function objectsProvider()
    {
        return [
            [[]],
            [new stdClass],
        ];
    }

    /**
     * @dataProvider nonObjectsProvider
     */
    public function test_it_fails_on_non_objects($value)
    {
        $type = gettype($value);
        $error = null;

        try {
            assert_object($value);
        } catch (\Throwable $e) {
            $error = $e;
        }

        $this->assertInstanceOf(\Throwable::class, $error, "[{$type}] should not pass assertion");
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
