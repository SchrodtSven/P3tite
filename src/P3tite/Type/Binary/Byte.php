<?php

declare(strict_types=1);
/**
 * Class representing a 8 bit wide data structure ('byte') 
 * 
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P3tite
 * @package P3tite
 * @version 0.1
 * @since 2022-08-14
 */

namespace P3tite\Type\Binary;


class Byte extends Bits
{
    protected int $length = 8;

    public function __construct(int $value)
    {
        parent::__construct($value, $this->length);
    }
}