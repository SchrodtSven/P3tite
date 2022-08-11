<?php

declare(strict_types=1);
/**
 * Class representing strings as instances
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
    private string $content = '';

    private string $before = '';


    public function __construct(string $begin = '')
    {
        $this->content = $begin;
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

    public function split(int $length = 1, ?string $encoding = null): array
    {
        return mb_str_split($this->content, $length, $encoding);
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
    public function cut (int $start, ?int $length = null,?string $encoding = null): self
    {
        return new self(mb_strcut($this->content, $start, $length,$encoding));
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

    public function concat(string $addition): self
    {
        $this->content .= $addition;
        return $this;
    }

    public function trim(string $characters = " \n\r\t\v\x00"): self
    {
        $this->content = trim($this->content , $characters);
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
}
