<?php
declare(strict_types = 1);

namespace Baethon\Phln\Monad;

use Baethon\Phln\Structure\Functor;

class Constant implements Functor
{
    /**
     * @var mixed
     */
    private $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    public function map(callable $fn)
    {
        return new static($fn($this->value));
    }

    public function extract()
    {
        return $this->value;
    }
}
