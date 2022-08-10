<?php

declare(strict_types=1);
/**
 * Class representing strings as instances
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

    public function splitBy(string  $separator, bool $removeEmptyFirst = false): ArrayClass
    {
        $tmp = new ArrayClass(explode($separator, $this->getContent()));
        if($removeEmptyFirst && empty($tmp->get(0))) {
            $tmp->unset(0);
        }
        return $tmp;
    }

    public function concat(string $addition): self
    {
        $this->content .= $addition;
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
}
