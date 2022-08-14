<?php

declare(strict_types=1);
/**
 * Unit testing Foo 
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P3tite
 * @package P3tite
 * @version 0.1
 * @since 2022-08-11
 */

use P3tite\Code\GenericPart;
use P3tite\Type\ArrayClass;
use P3tite\Type\StringClass;

use PHPUnit\Framework\TestCase;

class MockTest extends TestCase
{



    public function testJsonParing()
    {
        $firstNameMale = new ArrayClass();
        $firstNameFemale = new ArrayClass();
        $firstNames = new ArrayClass();
        $dta = json_decode(file_get_contents('MOCK_DATA.json'));
        for ($i = 0; $i < count($dta); $i++) {
           // echo $dta[$i]->gender . ' : : ' . $dta[$i]->firstName . PHP_EOL;
            $firstNames->push($dta[$i]->firstName);
            
        }
        $firstNames->sort();
        var_dump($firstNames);
        $this->assertTrue(is_string($dta[0]->lastName));
    }
}
