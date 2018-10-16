<?php
declare(strict_types=1);

namespace Baethon\Phln;

/**
 * Check if value is valid object.
 *
 * Value is considered as object if its an array
 * or class instance.
 *
 * @param mixed $value
 * @return void
 * @throws \Exception
 * @internal
 */
function assert_object($value)
{
    $type = gettype($value);

    assert(
        is_object($value) || is_array($value),
        new \Exception("[{$type}] is not a valid object")
    );
}

function load_macro(string $ns, $name)
{
    $names = is_array($name)
        ? $name
        : [$name];

    foreach ($names as $filename) {
        require_once(__DIR__."/macros/{$ns}/{$filename}.php");
    }
}
