<?php

declare(strict_types=1);
/**
 * Abstract action controller class
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P3tite
 * @package P3tite
 * @version 0.1
 * @since 2022-08-14
 */

namespace P3tite\Type\Binary;


class Bit
{
    private $value = false;

    public const TRUE = '1';

    public const FALSE = '0';

    public function __construct(bool $value=false)
    {
        $this->value = $value;
    }

    public function not()
    {
        $this->value = ($this->value) ? false : true;
        return $this;
    }

    public function __toString(): string
    {
        return ($this->value) ? self::TRUE : self::FALSE;
    }

    public static function f(bool $value)
    {
        return new self($value);
    }

}