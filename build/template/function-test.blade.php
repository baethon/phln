{!! '<?'.'php' !!}

use function phln\{{$ns}}\{{$name}};
use const phln\{{$ns}}\{{$name}};

class {{ ucfirst("{$name}Test") }} extends \PHPUnit_Framework_TestCase
{
}
