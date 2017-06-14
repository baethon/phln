<?php
declare(strict_types=1);

namespace phln;

final class RegExp
{
    /**
     * @var string
     */
    private $pattern;

    /**
     * @var string
     */
    private $modifiers;

    /**
     * @var bool
     */
    private $global = false;

    public function __construct(string $pattern, string $modifiers = '')
    {
        $this->pattern = $this->wrapInDelimiters($pattern);
        $this->modifiers = str_replace('g', '', $modifiers);
        $this->global = (false !== strstr($modifiers, 'g'));
    }

    public function isGlobal(): bool
    {
        return $this->global;
    }

    public function __toString(): string
    {
        return $this->pattern.$this->modifiers;
    }

    private function wrapInDelimiters(string $pattern): string
    {
        return $this->hasDelimiters($pattern) ? $pattern : "/{$pattern}/";
    }

    /**
     * Checks if pattern has valid delimiter
     *
     * @param string $pattern
     * @return bool
     * @see https://secure.php.net/manual/en/regexp.reference.delimiters.php
     */
    private function hasDelimiters(string $pattern): bool
    {
        if (mb_strlen($pattern) < 2) {
            return false;
        }

        $start = substr($pattern, 0, 1);
        $end = substr($pattern, -1);

        if ($start !== $end) {
            return false;
        }

        return (bool) preg_match('/^[^a-z0-9\s]+$/', $start.$end);
    }
}
