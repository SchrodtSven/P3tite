<?php

declare(strict_types=1);
/**
 * Class representing array (integer based indices, so called 'list') as instances
 *  
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P3tite
 * @package P3tite
 * @version 0.1
 * @since 2022-08-09
 */

namespace P3tite\Type;

class ArrayClass implements \Countable
{
    protected array $content = [];

    protected array $before = [];

    public function __construct(array $begin = [])
    {
        $this->content = $begin;
    }


    public function clone(): self
    {
        return new self($this->getContent());
    }

    public function get(int $index): mixed
    {
        return $this->content[$index] ?? null;
    }

    public function set(int $index, $value): self
    {
        $this->content[$index] ?? null;
        return $this;
    }


    public function unset(int $index): self
    {
        if(array_key_exists($index, $this->content)) {
            unset ($this->content[$index]);
        }
        return $this;
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

    public function getSaved(): array
    {
        return $this->before;
    }

    public function rollback(): self
    {
        $this->content = $this->before;
        return $this;
    }

    public function getContent(): array
    {
        return $this->content;
    }

    public function count(): int
    {
        return count($this->content);
    }

}