<?php
declare(strict_types=1);
/**
 * Dynamically modified file for testing currently written code
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

class DanglingTest extends TestCase
{
    public function testHeroes()
    {
        $parsed = new ArrayClass();
        $data = new ArrayClass(file('src/P3tite/Code/Mocking/raw_data/heroes_marvel.txt'));
        $this->assertTrue(is_object($data));
        foreach($data as $item) {
            $parsed->push((new StringClass($item))->splitBy("\t"));
        }

        print_r($parsed);  
    }
}