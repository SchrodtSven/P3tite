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
use P3tite\Code\Mocking\RandomData;
use phpDocumentor\Reflection\DocBlock\Tags\Var_;

class MockTest extends TestCase
{



    public function testJsonParing()
    {
        $parsed = new ArrayClass();
        $data = new ArrayClass(json_decode(file_get_contents('MOCK_DATA.json')));
        $this->assertTrue(2 === 1 + 1);
        foreach ($data as $item) {
            $parsed->push((new StringClass($item->catchPhrase))->quote());
        }

        var_dump($parsed->join(', ')->prepend("\n\n"))->append("\n\n");
    }
}
