<?php
declare(strict_types=1);

namespace phln\fn;

use function phln\fn\curryN;

const invoker = '\\phln\\fn\\invoker';
const 𝑓invoker = '\\phln\\fn\\𝑓invoker';

/**
 * Turns a named method with a specified arity into a function that can be called directly supplied with arguments and a target object.
 *
 * The returned function is curried and accepts `arity + 1` parameters where the final parameter is the target object.
 *
 * @phlnSignature Int -> String -> (a -> b -> c -> ... -> n -> Object -> *)
 * @phlnCategory function
 * @since 1.2.0
 * @param int $arity
 * @param string $method
 * @return \Closure
 * @example
 *      $greeter = new class ()
 *      {
 *          public function hello($name, $lastname)
 *          {
 *              return "Hello, {$name} {$lastname}!";
 *          }
 *      };
 *
 *      $helloToJon = \phln\fn\invoker(2, 'hello')('Jon');
 *      $helloToJon('Snow'); // 'Hello, Jon Snow!'
 */
function invoker(int $arity = null, string $method): \Closure
{
    return curryN(2, 𝑓invoker, func_get_args());
}

function 𝑓invoker(int $arity, string $method): \Closure
{
    $wrapper = function(...$args) use ($arity, $method) {
        $args = array_slice($args, 0, $arity + 1);
        $object = array_pop($args);

        assert(is_object($object));

        return $object->$method(...$args);
    };

    return curryN($arity + 1, $wrapper);
}
