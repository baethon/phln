<?php
declare(strict_types = 1);

namespace Baethon\Phln\Monad;

trait AssertsSameTypeTrait
{
    public function assertSameType($object)
    {
        $className = get_class($this);
        assert($object instanceof $className, "Given object in not of the same type");
    }
}
