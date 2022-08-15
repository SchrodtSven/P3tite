<?php

declare(strict_types=1);
/**
 * Declaration - class representing a single CSS declaration <property>:<value> - e.g:
 *
 *  <code>
 * font-family: Comic sans, Gargoyle
 *  </code>
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P3tite
 * @package P3tite
 * @version 0.1
 * @since 2022-08-15
 */

namespace P3tite\Frontend\StyleSheet;

use P3tite\Type\StringClass;

class Declaration implements \Stringable
{
    /**
     * @var StringClass
     */
    private StringClass $property;

    /**
     * @var StringClass
     */
    private StringClass $value;

    /**
     * @param string $property
     * @param string $value
     */
    public function __construct(string $property, string $value)
    {
        $this->property = new StringClass ($property);
        $this->value = new StringClass($value);
    }   

    /**
     * @return string
     */
    public function getProperty(): StringClass
    {
        return $this->property;
    }

    /**
     * @param string $property
     * @return Declaration
     */
    public function setProperty(string $property): self
    {
        $this->property = $property;
        return $this;
    }

    /**
     * @return StringClass
     */
    public function getValue(): StringClass
    {
        return $this->value;
    }

    /**
     * @param StringClass $value
     * @return Declaration
     */
    public function setValue(StringClass $value): self
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return sprintf('%s:%s', (string) $this->property, (string) $this->value);
    }
}