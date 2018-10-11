<?php

use Baethon\Phln\Phln as P;

class ThrowExceptionTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider exceptionProvider
     */
    public function test_it_throws_exception(string $className, array $args)
    {
        if (true === isset($args[0])) {
            $this->expectExceptionMessage($args[0]);
        }

        if (true === isset($args[1])) {
            $this->expectExceptionCode($args[1]);
        }

        $this->expectException($className);

        P::throwException($className, $args)();
    }

    public function exceptionProvider()
    {
        return [
            [\Exception::class, []],
            [\InvalidArgumentException::class, []],
            [\Exception::class, ['foo', 100]]
        ];
    }
}
