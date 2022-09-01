<?php

declare(strict_types=1);
/**
 * Unit testing Query
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P3tite
 * @package P3tite
 * @version 0.1
 * @since 2022-08-31
 */

use P3tite\Core\Testing\UnitTest;
use P3tite\Type\StringClass;
use P3tite\Type\ArrayClass;
use P3tite\Code\Lang\Sql\Query;

class QueryTest extends UnitTest
{
    public function testBasix()
    {
        $foo = new Query('Foo');
        $numeric = array_keys($foo->getValidKeyword(true)->getContent());
        $alpha = array_keys($foo->getValidKeyword(false)->getContent());

        foreach ($numeric as $index) {
            $this->assertTrue(is_int($index));
        }

        foreach ($alpha as $key) {
            $this->assertTrue(is_string($key));
        }
    }
}