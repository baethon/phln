<?php
declare(strict_types=1);

namespace Baethon\Phln;

final class FixedArityFn implements FixedArityInterface
{
    /**
     * @type integer
     */
    private $arity;

    /**
     * @type callable
     */
    private $fn;

    private function __construct(int $arity, callable $fn)
    {
        $this->arity = $arity;
        $this->fn = $fn;
    }

    public function getArity(): int
    {
        return $this->arity;
    }

    public static function of(int $arity, callable $fn): self
    {
        return new static($arity, $fn);
    }

    public function __invoke(...$args)
    {
        return call_user_func_array($this->fn, array_slice($args, 0, $this->arity));
    }
}
