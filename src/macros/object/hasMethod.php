<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;

P::macro('hasMethod', function ($method, $object) {
    try {
        $reflection = new \ReflectionObject($object);

        return $reflection->getMethod($method)
            ->isPublic();
    } catch (\Throwable $e) {
        return false;
    }
});
