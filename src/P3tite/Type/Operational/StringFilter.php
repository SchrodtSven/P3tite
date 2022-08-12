<?php

declare(strict_types=1);
/**
 * Class for applying filters on instances of StringClas and defining commmonly uesd patterns
 *  
 * @TODO - implement \Iterator 
 * @TODO push, pop etc. multiple [] && class!! (import?)
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P3tite
 * @package P3tite
 * @version 0.1
 * @since 2022-08-12
 */

namespace P3tite\Type\Operational;
use P3tite\Type\StringClass;
use P3tite\Type\ArrayClass;


class StringFilter
{
    public const WHITESPACE_ONLY = '/\A\s*\z/';
}