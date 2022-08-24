<?php

declare(strict_types=1);
/**
 * Testing File reader
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P3tite
 * @package P3tite
 * @version 0.1
 * @since 2022-08-15
 */

use P3tite\File\Reader;
use PHPUnit\Framework\TestCase;
use P3tite\Type\ArrayClass;
use P3tite\Type\StringClass;

class ReaderTest extends TestCase
{

    public function testReading()
    {
        $bar = new Reader('src/P3tite/Code/Mocking/raw_data/html5_global_attr.txt');
        $elements = new ArrayClass();
        $list = new ArrayClass();
        foreach ($bar as $line) {
            $this->assertInstanceOf('P3tite\Type\StringClass', $line);

            $foo = $line->splitBy("\t");
            $elements->push(
                //(string)
                (new StringClass($foo[0]))->replaceMultiple(
                    ['<', '>', '/'],
                    ['']
                )->trim()
            );
            
        }


    }
}
