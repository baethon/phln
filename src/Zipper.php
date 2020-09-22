<?php

declare(strict_types=1);

namespace Baethon\Phln;

final class Zipper
{
    /**
     * @var Zipper|null
     */
    private $parent;

    /**
     * @var ObjectWrapper|mixed
     */
    private $current;

    /**
     * @var string
     */
    private $property;

    /**
     * @param ObjectWrapper|mixed $current
     */
    private function __construct($current)
    {
        $this->current = $current;
    }

    /**
     * @param ObjectWrapper|mixed $current
     */
    public static function of($current): Zipper
    {
        return new static(
            (ObjectWrapper::isObject($current) || is_null($current))
                ? ObjectWrapper::of($current ?? [])
                : $current
        );
    }

    public function down(string $property): Zipper
    {
        if (!ObjectWrapper::isObject($this->current)) {
            throw new \RuntimeException('Impossible to go down tree');
        }

        return tap(Zipper::of($this->current->prop($property)), function (Zipper $newCurrent) use ($property) {
            $newCurrent->parent = $this;
            $newCurrent->property = $property;
        });
    }

    /**
     * @param mixed $value
     */
    public function update($value): Zipper
    {
        return tap(clone $this, function (Zipper $copy) use ($value) {
            $copy->current = $value;
        });
    }

    public function up(): ?Zipper
    {
        if (!$parent = $this->parent) {
            return null;
        }

        $current = $parent->current->assoc(
            $this->property,
            ($this->current instanceof ObjectWrapper)
                ? $this->current->toArray()
                : $this->current
        );

        return tap(clone $parent, function (Zipper $zipper) use ($current) {
            $zipper->current = $current;
        });
    }

    public function root(): Zipper
    {
        $thunk = trampoline(function (Zipper $zipper) {
            if ($zipper->parent) {
                /**
                 * @psalm-suppress InvalidFunctionCall
                 * @phpstan-ignore-next-line
                 */
                return $this($zipper->up());
            }

            return $zipper;
        });

        return $thunk($this);
    }

    /**
     * @return array<mixed>
     */
    public function toArray(): array
    {
        if ($this->current instanceof ObjectWrapper) {
            return $this->current->toArray();
        }

        throw new \BadMethodCallException('Current value can\'t be converted to an array');
    }

    /**
     * @return ObjectWrapper|mixed
     */
    public function current()
    {
        return $this->current;
    }
}