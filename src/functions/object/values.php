<?php

declare(strict_types=1);

namespace Baethon\Phln;

const values = 'Baethon\\Phln\\values';

/**
 * @param array<mixed>|object $object
 * @return array<mixed>
 */
function values ($object): array
{
    assert_object($object);
    return array_values((array) $object);
};
