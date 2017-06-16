<?php
declare(strict_types=1);

namespace phln\fn;

const ap = '\\phln\\fn\\ap';
const 𝑓ap = '\\phln\\fn\\𝑓ap';

/**
 * Applies function to functor.
 *
 * @phlnSignature Apply f => f a ~> (a -> b) -> f b
 * @phlnCategory function
 * @param string $applicative
 * @param string $fn
 * @return \Closure|mixed
 * @example
 *      $some = Some(1);
 *      ap($some, \phln\math\inc); // Some(2)
 */
function ap($applicative = nil, $fn = nil)
{
    return curryN(2, 𝑓ap, [$applicative, $fn]);
}

function 𝑓ap($applicative, callable $fn)
{
    return $applicative->ap($fn);
}
