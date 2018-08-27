{!! '<?'.'php' !!}
declare(strict_types=1);

namespace phln\{{$ns}};

use function phln\fn\curryN;

const {{$name}} = '\\phln\\{{$ns}}\\{{$name}}';
const 𝑓{{$name}} = '\\phln\\{{$ns}}\\𝑓{{$name}}';

/**
 * Dummy description of {{$name}} function.
 *
 * @phlnSignature * -> *
 * @phlnCategory {{$ns}}
 * @return \Closure|mixed
 * @example
 *      \phln\{{$ns}}\{{$name}}();
 */
function {{$name}}()
{
    return curryN(0, 𝑓{{$name}}, func_get_args());
}

function 𝑓{{$name}}()
{
}
