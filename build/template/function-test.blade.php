{!! '<?'.'php' !!}

use Baethon\Phln\Phln as P;

class {{ ucfirst("{$name}Test") }} extends \PHPUnit\Framework\TestCase
{
    public function test_it_works()
    {
        $this->assertTrue(P::{{$name}}());
    }
}
