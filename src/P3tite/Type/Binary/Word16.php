<?php

declare(strict_types=1);
/**
 * Class representing a 16 bit wide word 
 * 
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P3tite
 * @package P3tite
 * @version 0.1
 * @since 2022-08-14
 */

namespace P3tite\Type\Binary;


class Word16 extends Bits
{
    private int $length = 16;

    public function __construct(int $value)
    {
        parent::__construct($value, $this->length);

    }
}