<?php
declare(strict_types = 1);

namespace Baethon\Phln\Monad;

final class Constant
{
    /**
     * @var mixed
     */
    private $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    public function map(callable $fn): Constant
    {
        return new static($this->value);
    }

    public static function of($value): Constant
    {
        return new static($value);
    }

    public function extract()
    {
        return $this->value;
    }
}
