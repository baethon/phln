<?php
declare(strict_types = 1);

namespace Baethon\Phln;

class TrampolineThunk
{
    /**
     * @var \Closure
     */
    private $fn;

    public function __construct(callable $fn)
    {
        $this->fn = \Closure::fromCallable($fn)
            ->bindTo($this);
    }

    public function __invoke(...$args)
    {
        $fn = $this->fn;

        return function () use ($args, $fn) {
            return $fn(...$args);
        };
    }
}
