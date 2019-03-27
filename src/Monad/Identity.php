<?php
declare(strict_types = 1);

namespace Baethon\Phln\Monad;

final class Identity
{
    /**
     * @var mixed
     */
    private $value;

    private function __construct($value)
    {
        $this->value = $value;
    }

    public function map(callable $fn): Identity
    {
        return Identity::of($fn($this->value));
    }

    public static function of($value): Identity
    {
        return new static($value);
    }

    public function extract()
    {
        return $this->value;
    }
}
