<?php

declare(strict_types=1);
/**
 * Class representing a 2 bit wide data structure 
 * 
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P3tite
 * @package P3tite
 * @version 0.1
 * @since 2022-08-14
 */

namespace P3tite\Type\Binary;


class Crumb extends Bits
{
    protected int $length = 2;

    public function __construct(int $value)
    {
        parent::__construct($value, $this->length);
    }
}