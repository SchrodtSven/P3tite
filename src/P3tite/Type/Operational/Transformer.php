<?php

declare(strict_types=1);
/**
 * Foundation class representing SQL statements 
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P3tite
 * @package P3tite
 * @version 0.1
 * @since 2022-08-31
 */

namespace P3tite\Type\Operational;
use P3tite\Type\StringClass;
use P3tite\Type\ArrayClass;

class Transformer
{



    public function mixedToString(mixed $input): string
    {
        //@FIXME detecting all types, adding \P3tite\Type\

        switch(true) {
            case $input instanceof \P3tite\Type\ArrayClass:
                return (string) $input->join(', ');
                break;

                default:
                return (string) $input;
        }
    }
}