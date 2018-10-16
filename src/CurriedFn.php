<?php
declare(strict_types=1);

namespace Baethon\Phln;

final class CurriedFn
{
    /**
     * @type callable
     */
    private $fn;

    /**
     * @type integer
     */
    private $arity;

    /**
     * @type array
     */
    private $args = [];

    private function __construct(int $arity, callable $fn, array $args = [])
    {
        $this->arity = $arity;
        $this->fn = $fn;
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
