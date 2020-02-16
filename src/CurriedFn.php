<?php

declare(strict_types=1);

namespace Baethon\Phln;

final class CurriedFn implements FixedArityInterface
{
    private \Closure $fn;

    private int $arity;

    /**
     * @var array<int, mixed> $args
     */
    private array $args = [];

    /**
     * @param int $arity
     * @param callable $fn,
     * @param mixed[] $args
     */
    private function __construct(int $arity, callable $fn, array $args = [])
    {
        $this->arity = $arity;
        $this->fn = \Closure::fromCallable($fn);
        $this->args = $args;
    }

    public static function of(callable $fn): self
    {
        return ($fn instanceof static)
            ? new static($fn->arity, $fn->fn, $fn->args)
            : static::ofN(Phln::arity($fn), $fn);
    }

    public static function ofN(int $arity, callable $fn): self
    {
        return new static($arity, $fn);
    }

    /**
     * @param array<int, mixed> ...$args
     * @return CurriedFn|mixed
     */
    public function __invoke(...$args)
    {
        $allArgs = array_merge($this->args, $args);

        return ($this->arity > count($allArgs))
            ? new static($this->arity, $this->fn, $allArgs)
            : call_user_func_array($this->fn, $allArgs);
    }

    public function getArity(): int
    {
        return $this->arity - count($this->args);
    }
}
