{!! '<?'.'php' !!}

use const phln\{{$ns}}\{{$name}};

class {{ ucfirst("{$name}Test") }} extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return {{$name}};
    }

    /** @test */
    public function it_works()
    {
        $this->assertTrue($this->callFn());
    }
}
