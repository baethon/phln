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
        return $this->hasDelimiters($pattern) ? $pattern : sprintf(
            '/%s/',
            str_replace('/', '\\/', $pattern)
        );
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

        return static::isValidDelimiter($start) && static::isValidDelimiter($end);
    }

    private static function isValidDelimiter(string $char): bool
    {
        return (bool) preg_match('/^[^a-z0-9\s]$/', $char);
    }

    /**
     * Creates RegExp instance based on passed regular expression.
     *
     * @param string $regexp
     * @return RegExp
     * @example
     *      RegExp::fromString('/foo/gi'); // -> new RegExp('/foo/', 'gi');
     */
    public static function fromString(string $regexp): RegExp
    {
        $start = substr($regexp, 0, 1);

        if (false === static::isValidDelimiter($start)) {
            return new static($regexp);
        }

        $endPosition = strrpos($regexp, $start);
        $pattern = substr($regexp, 0, $endPosition + 1);
        $modifiers = substr($regexp, $endPosition + 1);

        return new static($pattern, $modifiers);
    }

    public function matchAll(string $test): array
    {
        $matches = [];
        preg_match_all((string) $this, $test, $matches);

        return isset($matches[0]) ? $matches[0] : [];
    }
}
