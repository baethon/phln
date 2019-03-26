<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;
use function Baethon\Phln\assert_object;

$clone = function ($object) {
    return is_object($object)
        ? clone $object
        : $object;
};

$assoc = function & ($key, $value, & $anchor) {
    assert_object($anchor);

    if (is_object($anchor)) {
        $anchor->{$key} = $value;

        return $anchor->{$key};
    }

    $anchor[$key] = $value;

    return $anchor[$key];
};

P::macro('assocPath', function (string $path, $value, $object) use ($clone, $assoc) {
    assert_object($object);

    $keys = P::split('.', $path);

    if (count($keys) === 0) {
        return P::assoc($path, $value, $object);
    }

    $anchorPath = P::init($keys);
    $lastProp = P::last($keys);

    $copy = $clone($object);
    $anchor =& $copy;

    foreach ($anchorPath as $k) {
        $node = P::has($k, $anchor)
            ? $clone(P::prop($k, $anchor))
            : [];

        $anchor =& $assoc($k, $node, $anchor);
    }

    $assoc($lastProp, $value, $anchor);
    unset($anchor);

    return $copy;
});
