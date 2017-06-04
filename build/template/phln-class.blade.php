{!! '<?'.'php' !!}
declare(strict_types=1);

namespace phln;

use Closure;
use const phln\fn\nil;

class Phln
{
@foreach($constants as $item)
    const {{ $item['name'] }} = \{{ $item['fqn'] }};
@endforeach

@foreach($functions as $item)
{!! $item['doc'] !!}
    public static function {{ $item['name'] }}({{ $item['parameters']['definition'] }}){{ $item['returnType'] }}
    {
        return \{{ $item['fqn'] }}({{ $item['parameters']['invoke'] }});
    }

@endforeach
}
