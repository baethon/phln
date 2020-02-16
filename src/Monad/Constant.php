<?php

declare(strict_types=1);

namespace Baethon\Phln\Monad;

final class Constant
{
    /**
     * @var mixed
     */
    private $value;

    /**
     * @param mixed $value
     */
    public function __construct($value)
    {
        $this->value = $value;
    }

    public function map(callable $fn): Constant
    {
        return new static($this->value);
    }

    /**
     * @param mixed $value
     */
    public static function of($value): Constant
    {
        return new static($value);
    }

    /**
     * @return mixed
     */
    public function extract()
    {
        return $this->value;
    }
}
