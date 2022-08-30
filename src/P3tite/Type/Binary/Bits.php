<?php

declare(strict_types=1);
/**
 * Class representing an n bit wide data structure 
 *  
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P3tite
 * @package P3tite
 * @version 0.1
 * @since 2022-08-14
 */

namespace P3tite\Type\Binary;

use P3tite\Type\StringClass;

class Bits implements \Stringable
{

    protected int $lsb = 0;

    protected int $msb;

    protected int $length;

    protected int $minValue = 0;

    protected int $maxValue;

    protected int $currentValue;

    public const EXPONENT = 2;


    protected const ERROR_BETWEEN_CONSTRAINT = '$value MUST be between %d and %d, when using bit length: %d, %d given';

    public function __construct(int $value, int $length = 32)
    {
        $this->msb = $length - 1;
        $this->length = $length;
        $this->maxValue = pow(self::EXPONENT, $length) - 1;
        $this->setCurrentValue($value);
    }

    public function getCurrentValue(): int
    {
        return $this->currentValue;
    }

    public function setCurrentValue(int $value)
    {
        if ($value > $this->maxValue || $value < $this->minValue) {
            throw new \InvalidArgumentException(
                sprintf(
                    self::ERROR_BETWEEN_CONSTRAINT,
                    $this->minValue,
                    $this->maxValue,
                    $this->length,
                    $value
                )
            );
        }
        $this->currentValue = $value;
        return $this;
    }


    public function getBinaryLiteral(): StringClass
    {
        return (new StringClass(sprintf('%b', $this->currentValue)))->padLeft($this->length, '0');
    }


    public function setBinaryLiteral(string $literal): self
    {
        $this->value = bindec($literal); 
        return $this;
    }

    public function __toString(): string
    {
        return $this->getBinaryLiteral()->getContent();
    }

    public function not(): self
    {
        $tmp = new StringClass(sprintf('%b', $this->getCurrentValue()));
        $parts = $tmp->split();
        
        $parts->walk(function (&$item) {
            $item = (string)Bit::f((bool)$item)->not();
        });
        $this->setCurrentValue(bindec((string) $parts->join('')));
        return $this;
    }

    public function and(Bits $operand): self
    {
        return new self($this->currentValue & $operand->currentValue);
    }

    public function or(Bits $operand): self
    {
        return new self($this->currentValue | $operand->currentValue);
    }

    public function xOr(Bits $operand): self
    {
        return new self($this->currentValue ^ $operand->currentValue);
    }

    

    /**
     * Get the value of maxValue
     *
     * @return int
     */
    public function getMaxValue(): int
    {
        return $this->maxValue;
    }

    /**
     * Set the value of maxValue
     *
     * @param int $maxValue
     *
     * @return self
     */
    public function setMaxValue(int $maxValue): self
    {
        $this->maxValue = $maxValue;

        return $this;
    }

    /**
     * Get the value of minValue
     *
     * @return int
     */
    public function getMinValue(): int
    {
        return $this->minValue;
    }

    /**
     * Set the value of minValue
     *
     * @param int $minValue
     *
     * @return self
     */
    public function setMinValue(int $minValue): self
    {
        $this->minValue = $minValue;

        return $this;
    }


    /**
     * Set the value of lsb
     *
     * @param int $lsb
     *
     * @return self
     */
    public function setLsb(int $lsb): self
    {
        $this->lsb = $lsb;

        return $this;
    }

    /**
     * Get the value of msb
     *
     * @return int
     */
    public function getMsb(): int
    {
        return $this->msb;
    }

    /**
     * Get the value of length
     *
     * @return int
     */
    public function getLength(): int
    {
        return $this->length;
    }
}
