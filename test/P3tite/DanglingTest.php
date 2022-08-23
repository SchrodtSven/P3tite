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
use P3tite\Code\Mocking\RandomData;

class DanglingTest extends TestCase
{
    public function testHeroes()
    {
        $parsed = new ArrayClass();
        $data = new ArrayClass(json_decode(file_get_contents('MOCK_DATA.json')));
        // print_r(exec('file ' . 'MOCK_DATA.json'));die;
        $rnd = new RandomData();

        $this->assertTrue(2 === 1 + 1);

        $foo = array_keys(get_object_vars($data[0]));
      //      print_r($foo);die;
        foreach ($foo as $name) {
            if ($name === 'id')
                continue;
            echo $name . ' :: ' . $rnd->getRandomElement($name) . PHP_EOL;
        };
    }
}
