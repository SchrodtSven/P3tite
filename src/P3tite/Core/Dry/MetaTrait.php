<?php

declare(strict_types=1);
/**
 * Trait offering methods for meta data retrieval
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P3tite
 * @package P3tite
 * @version 0.1
 * @since 2022-08-31
 */

namespace P3tite\Core\Dry;

use P3tite\Type\StringClass;
use P3tite\Type\ArrayClass;

trait MetaTrait
{

    public static function getConstants(): ArrayClass
    {
        return (new ArrayClass(
                (new \ReflectionClass(__CLASS__)
                )
                    ->getConstants()
            )
        );
    }
}
