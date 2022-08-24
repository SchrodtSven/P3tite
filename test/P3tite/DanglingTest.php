<?php

declare(strict_types=1);
/**
 * Dynamically temporary modified file for testing currently written code
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P3tite
 * @package P3tite
 * @version 0.1
 * @since 2022-08-12
 */

use P3tite\Type\StringClass;
use P3tite\Type\ArrayClass;
use PHPUnit\Framework\TestCase;
use P3tite\Code\Mocking\RandomData;
use P3tite\Type\Binary\Byte;

class DanglingTest extends TestCase
{
    public function testHeroes()
    {
        echo PHP_EOL;
       for($i=0;$i < 256;$i++) {
        $foo = new Byte($i); 
        echo (new StringClass((string) $foo))->quote()->prepend('[' . $i .', '. $i .', ' )->append('],');       
        //if($i % 4 === 0) 
        echo PHP_EOL;
    }
      
       $bar = new Byte(1);
      
       $this->assertTrue($bar->getMaxValue() === 255);
       $this->assertTrue($bar->getMinValue() === 0);
    }
}
