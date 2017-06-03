{!! '<?'.'php' !!}
declare(strict_types=1);

namespace phln;

use Closure;
use const phln\fn\nil;

class phln
{
@foreach($functions as $item)
    public static function {{ $item['name'] }}({{ $item['parametersDefinition'] }}){{ $item['returnType'] }}
    {
    }

@endforeach
}
