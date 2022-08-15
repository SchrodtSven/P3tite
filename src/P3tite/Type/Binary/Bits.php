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

class Bits
{

    private int $lsb = 0;

    private int $msb;

    private int $length;

    private int $minValue = 0;

    private int $maxValue;

    private int $currentValue;

    public const EXPONENT = 2;


    private const ERROR_BETWEEN_CONSTRAINT = '$value MUST be between %d and %d, when using bit length: %d, %d given';

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
        return (new StringClass(sprintf('%b', $this->currentValue)))->pad($this->msb + 1, '0');
    }

    public function __toString(): string
    {
        return $this->getBinaryLiteral()->getContent();
    }

    public function not(): Bits
    {
        $tmp = new StringClass(sprintf('%b', $this->getCurrentValue()));
        $parts = $tmp->split();
        
        $parts->walk(function (&$item) {
            $item = (string)Bit::f((bool)$item)->not();
        });
        $this->setCurrentValue(bindec((string) $parts->join('')));
        return $this;
    }

    public function and(Bits $operand): Bits
    {
        return new self($this->currentValue & $operand->currentValue);
    }

    public function or(Bits $operand): Bits
    {
        return new self($this->currentValue | $operand->currentValue);
    }

    public function xOr(Bits $operand): Bits
    {
        return new self($this->currentValue ^ $operand->currentValue);
    }

    
}
