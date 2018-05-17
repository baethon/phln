<?php
declare(strict_types=1);

namespace phln\object;

const values = '\\phln\\object\\values';

/**
 * Returns values of supplied object
 *
 * @phlnSignature {k: v} -> [v]
 * @phlnCategory object
 * @param array|object $object
 * @return array
 */
function values($object): array
{
    assertObject($object);

    return array_values((array) $object);
}

