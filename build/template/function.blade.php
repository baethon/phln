{!! '<?'.'php' !!}
declare(strict_types=1);

namespace phln\{{$ns}};

use function phln\fn\curryN;
use const phln\fn\nil;

const {{$name}} = '\\phln\\{{$ns}}\\{{$name}}';
const 𝑓{{$name}} = '\\phln\\{{$ns}}\\𝑓{{$name}}';

function {{$name}}()
{
    return curryN(N, 𝑓{{$name}});
}

function 𝑓{{$name}}()
{
}
