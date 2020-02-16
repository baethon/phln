<?php
declare(strict_types = 1);

namespace Baethon\Phln;

class TrampolineThunk
{
    private \Closure $fn;

    public function __construct(callable $fn)
    {
        $this->fn = \Closure::fromCallable($fn)
            ->bindTo($this);
    }

    /**
     * @param array<int, mixed> ...$args
     * @retun \Closure
     */
    public function __invoke(...$args): \Closure
    {
        $fn = $this->fn;

        return function () use ($args, $fn) {
            return $fn(...$args);
        };
    }
}
