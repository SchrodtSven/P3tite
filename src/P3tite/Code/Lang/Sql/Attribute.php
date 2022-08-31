<?php

declare(strict_types=1);
/**
 * Class representing a single SQL attribute (“column”) 
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P3tite
 * @package P3tite
 * @version 0.1
 * @since 2022-08-30
 */

namespace P3tite\Code\Lang\Sql;

use P3tite\Type\StringClass;
use P3tite\Type\ArrayClass;


class Attribute
{
    private StringClass $type;

    private mixed $min;

    private mixed $max;

    private StringClass $description;



    public function __construct(string $type = '', mixed $min = null, mixed $max = null, ?string $description = '')
    {
        $this->type = new StringClass($type);
        $this->description = new StringClass($description);
        $this->min = $min;
        $this->max = $max;
    }

    /**
     * Get the value of type
     *
     * @return StringClass
     */
    public function getType(): StringClass
    {
        return $this->type;
    }

    /**
     * Set the value of type
     *
     * @param StringClass $type
     *
     * @return self
     */
    public function setType(StringClass $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get the value of min
     *
     * @return mixed
     */
    public function getMin(): mixed
    {
        return $this->min;
    }

    /**
     * Set the value of min
     *
     * @param mixed $min
     *
     * @return self
     */
    public function setMin(mixed $min): self
    {
        $this->min = $min;

        return $this;
    }

    /**
     * Get the value of max
     *
     * @return mixed
     */
    public function getMax(): mixed
    {
        return $this->max;
    }

    /**
     * Set the value of max
     *
     * @param mixed $max
     *
     * @return self
     */
    public function setMax(mixed $max): self
    {
        $this->max = $max;

        return $this;
    }

    /**
     * Get the value of description
     *
     * @return StringClass
     */
    public function getDescription(): StringClass
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @param StringClass $description
     *
     * @return self
     */
    public function setDescription(StringClass $description): self
    {
        $this->description = $description;

        return $this;
    }
}
