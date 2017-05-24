{!! '<?'.'php' !!}
declare(strict_types=1);

namespace phln\{{$ns}};

use function phln\fn\curry;
use const phln\fn\nil;

const {{$name}} = '\\phln\\{{$ns}}\\{{$name}}';
const 𝑓{{$name}} = '\\phln\\{{$ns}}\\𝑓{{$name}}';

function {{$name}}()
{
    return curry(𝑓{{$name}});
}

function 𝑓{{$name}}()
{
}
