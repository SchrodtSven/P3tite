<?php

declare(strict_types=1);
/**
 * Class representing strings as instances - wrapping PHP native functions to offer an OO API for fluent interface chaining
 * E.g:
 * <code>
 *  (new StringClass('FOO'))->toLower()->upperFirst(); // Foo 
 * </code>
 * 
 * @FIXME - always use mb_* functions WHERE applicable!!!!
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P3tite
 * @package P3tite
 * @version 0.1
 * @since 2022-08-09
 */

namespace P3tite\Type;

class StringClass
{
    protected string $content = '';

    protected string $before = '';


    public function __construct(string $begin = '')
    {
        $this->content = $begin;
    }

    public function concat(string $addition): self
    {
        $this->content .= $addition;
        return $this;
    }

    public function prepend(string $begin): self
    {
        $this->content = $begin . $this->content;
        return $this;
    }


    public function append(string $end): self
    {
        $this->content = $this->content . $end;
        return $this;
    }

    public function trim(string $characters = " \n\r\t\v\x00"): self
    {
        $this->content = trim($this->content, $characters);
        return $this;
    }

    public function save(): self
    {
        $this->before = $this->content;
        return $this;
    }

    public function getSaved(): string
    {
        return $this->before;
    }

    public function rollback(): self
    {
        $this->content = $this->before;
        return $this;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function clone(): self
    {
        return new self($this->getContent());
    }

    public function length(): int
    {
        return mb_strlen($this->content);
    }

    public function width(): int
    {
        return mb_strwidth($this->content);
    }

    public function splitBy(string  $separator, bool $removeEmptyFirst = false, bool $removeEmptyLast = false): ArrayClass
    {
        $tmp = new ArrayClass(explode($separator, $this->getContent()));
        if ($removeEmptyFirst && empty($tmp->get(0))) {
            $tmp->shift();
        }
        if ($removeEmptyLast && empty($tmp->get(count($tmp) - 1))) {
            $tmp->pop();
        }
        return $tmp;
    }

    public function quote(string $sign="'"): self
    {
        $this->append($sign)->prepend($sign);
        return $this;
    }

    public function split(int $length = 1, ?string $encoding = null): array
    {
        return mb_str_split($this->content, $length, $encoding);
    }

    public function contains(string $needle): bool
    {
        return str_contains($this->content, $needle);
    }

    public function starts(string $needle): bool
    {
        return str_starts_with($this->content, $needle);
    }

    public function ends(string $needle): bool
    {
        return str_ends_with($this->content, $needle);
    }

    public function position(string $needle, int $offset = 0, bool $caseSensitive = true): int|false
    {
        return ($caseSensitive)
            ? mb_strpos($this->content, $needle, $offset)
            : mb_stripos($this->content, $needle, $offset);
    }

    public function subString(int $offset, ?int $length = null, ?string $encoding = null): self
    {
        return new self(mb_substr($this->content, $offset, $length, $encoding));
    }

    // operates on bytes NOT characters 
    // @see https://www.php.net/manual/de/function.mb-strcut.php
    public function cut(int $start, ?int $length = null, ?string $encoding = null): self
    {
        return new self(mb_strcut($this->content, $start, $length, $encoding));
    }

    public function replace(string $search, string $replace): self
    {
        $this->content = str_replace($search, $replace, $this->content);
        return $this;
    }

    public function replaceMultiple(array $search, array $replace): self
    {
        $this->content = str_replace($search, $replace, $this->content);
        return $this;
    }

    public function toLower(): self
    {
        $this->content = mb_strtolower($this->content);
        return $this;
    }

    public function toUpper(): self
    {
        $this->content = mb_strtoupper($this->content);
        return $this;
    }

    public function lowerFirst(): self
    {
        $this->content = lcfirst($this->content);
        return $this;
    }

    public function upperFirst(): self
    {
        $this->content = ucfirst($this->content);
        return $this;
    }

    public function upperWords(): self
    {
        $this->content = ucwords($this->content);
        return $this;
    }   

    public function pad(int $length, string $padString = " ", $padType = \STR_PAD_RIGHT): self
    {
        $this->content = str_pad($this->content, $length, $padString, $padType);
        return $this;
    }

    public function padBoth(int $length, string $padString = " "): self
    {
        return  $this->pad($length, $padString, \STR_PAD_BOTH);
    }

    public function padLeft(int $length, string $padString = " "): self
    {
        return $this->pad($length, $padString,  \STR_PAD_LEFT);
    }

    public function padRight(int $length, string $padString = " "): self
    {
        return $this->pad($length, $padString, \STR_PAD_RIGHT);
    }

    public function __toString(): string
    {
        return $this->content;
    }

    public function rot13(): string 
    {
        return str_rot13($this->content);
    }

    // functions operating on StringClass with Stringclass(es) as parameters

    public function equals(StringClass $text): bool
    {
        return $this->content === $text->getContent();
    }

    public function notEquals(StringClass $text): bool
    {
        return $this->content !== $text->getContent();
    }

    public function plus (StringClass $addition): self
    {
        $this->concat($addition->getContent());
        return $this;
    }

    public function convertTo(string $targetClass = 'GenericBuilder'): mixed
    {
        switch ($targetClass) {

            case 'GenericBuilder':
                return new \P3tite\Code\GenericBuilder($this->getContent());
                break;
        }
    }
}
