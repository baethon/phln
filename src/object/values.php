<?php
declare(strict_types=1);

namespace phln\object;

const values = '\\phln\\object\\values';

/**
 * Returns values of supplied object
 *
 * @phlnSignature {k: v} -> [v]
 * @phlnCategory object
 * @param array $object
 * @return array
 */
function values(array $object): array
{
    return array_values($object);
}

