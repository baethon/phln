<?php

declare(strict_types=1);

namespace Baethon\Phln;

class Duck
{
    /**
     * @param object $object
     */
    public static function isFunctor($object): bool
    {
        return method_exists($object, 'map');
    }
}
