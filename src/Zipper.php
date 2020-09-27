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
     * @var array<string, mixed>|mixed
     */
    private $current;

    /**
     * @var string
     */
    private $property;

    /**
     * @param array<string, mixed>|mixed $current
     */
    private function __construct($current)
    {
        $this->current = $current;
    }

    /**
     * @param array<string, mixed>|mixed $current
     */
    public static function of($current): Zipper
    {
        return new static(
            (is_hashmap($current) || is_null($current))
                ? hashmap($current ?? [])
                : $current
        );
    }

    public function down(string $property): Zipper
    {
        if (!is_hashmap($this->current)) {
            throw new \RuntimeException('Impossible to go down tree');
        }

        return tap(Zipper::of(prop($this->current, $property)), function (Zipper $newCurrent) use ($property) {
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

        $current = assoc(
            $parent->current,
            $this->property,
            $this->current
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
        if (is_array($this->current)) {
            return $this->current;
        }

        throw new \BadMethodCallException('Current value can\'t be converted to an array');
    }

    /**
     * @return array<string, mixed>|mixed
     */
    public function current()
    {
        return $this->current;
    }
}
