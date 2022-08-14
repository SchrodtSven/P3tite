<?php

declare(strict_types=1);
/**
 * Class representing array (integer based indices, so called 'list' or associative 'map|hash|hashmap') as instances
 * including: 
 * 
 * - accessing objects as arrays
 * 
 *   
 * @TODO push, pop etc. multiple [] && class!! (import?)
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P3tite
 * @package P3tite
 * @version 0.1
 * @since 2022-08-09
 */

namespace P3tite\Type;

use P3tite\Type\StringClass;
use P3tite\Type\Operational\ArrayFilter;

class ArrayClass implements \Countable, \Iterator, \ArrayAccess
{
    protected array $content = [];

    protected array $before = [];

    public function __construct(array $begin = [])
    {
        $this->content = $begin;
    }

    public function join(string $glue): StringClass
    {
        return new StringClass(implode($glue, $this->content));
    }

    public function clone(): self
    {
        return new self($this->getContent());
    }

    public function get(int $index): mixed
    {
        return $this->content[$index] ?? null;
    }

    public function set(int $index, mixed $value): self
    {
        $this->content[$index] ?? null;
        return $this;
    }

    public function getByKey(string $key): mixed
    {
        return $this->content[$key] ?? null;
    }

    public function setByKey(string $key, mixed $value): self
    {
        $this->content[$key] ?? null;
        return $this;
    }

    public function unset(int $index): self
    {
        if (array_key_exists($index, $this->content)) {
            unset($this->content[$index]);
        }
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

    public function empty(): bool
    {
        return (count($this->content) === 0) ? true : false;
    }

    public function push(mixed $value): self
    {
        array_push($this->content, $value);
        return $this;
    }


    public function pop(): mixed
    {
        return array_pop($this->content);
    }

    public function shift(): mixed
    {
        return array_shift($this->content);
    }

    public function unshift(mixed $value): self
    {
        array_unshift($this->content, $value);
        return $this;
    }


    /**
     * @TODO adding diferent sorting modes
     */
    public function sort(bool $ignoreCase = true): self
    {
        if ($ignoreCase) {
            natcasesort($this->content);
        } else {
            natsort($this->content);
        }
        return $this;
    }

    public function removeDuplicates(int $mode = \SORT_REGULAR): self
    {
        $this->content = array_unique($this->content, $mode);
        return $this;
    }

    public function walk(callable $callback)
    {
        $tmp = $this->getContent();
        array_walk($tmp, $callback);
        $this->content = $tmp;
    }

    public function getFilter(): ArrayFilter
    {
        return new ArrayFilter($this);
    }


    public function __isset(mixed $index): bool
    {
    
        return isset($this->content[$index]);
    }

    // The following functions implement interface \Iterator making it possible
    // to iterate container objects with foreach

    /**
     * Resetting pointer to first array element
     */
    public function rewind(): void
    {
        reset($this->content);
    }

    /**
     * Getting current element
     *
     */
    public function current(): mixed
    {
        return current($this->content);
    }

    /**
     * Getting key of current element
     * @return mixed
     */
    public function key(): mixed
    {
        return key($this->content);
    }

    /**
     * @return mixed|void
     */
    public function next(): void
    {
        next($this->content);
    }

    /**
     * Returning if current element is valid
     *
     * @return bool
     */
    public function valid(): bool
    {
        return ($this->current() !== false);
    }

    // The following functions implement interface \ArrayAccess
    //  to provide accessing objects as arrays


    public function offsetGet($offset): mixed
    {
        return $this->content[$offset] ?? null;
    }

    public function offsetSet($offset, $value): void
    {
        if (is_null($offset)) {
            $this->content[] = $value;
        } else {
            $this->content[$offset] = $value;
        }
    }

    public function offsetExists($offset): bool
    {
        return isset($this->content[$offset]);
    }

    public function offsetUnset($offset): void
    {
        unset($this->content[$offset]);
    }

    
}
