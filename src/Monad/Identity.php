<?php
declare(strict_types = 1);

namespace Baethon\Phln\Monad;

use Baethon\Phln\Structure\Monad;
use Baethon\Phln\Structure\Apply;
use Baethon\Phln\Structure\Setoid;

final class Identity implements
    Monad,
    Setoid
{
    use AssertsSameTypeTrait;

    private $value;

    private function __construct($value)
    {
        $this->value = $value;
    }

    public function map(callable $fn)
    {
        return Identity::of($fn($this->value));
    }

    public static function of($value)
    {
        return new static($value);
    }

    public function ap(Apply $a)
    {
        $this->assertSameType($a);

        return $a->map(function ($f) {
            return $f($this->value);
        });
    }

    public function chain(callable $fn)
    {
        $result = $fn($this->value);

        $this->assertSameType($result);

        return $result;
    }

    public function extract()
    {
        return $this->value;
    }

    public function equals(Setoid $other): bool
    {
        if (! $other instanceof self) {
            return false;
        }

        return $this->value === $other->value;
    }
}
