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
use P3tite\Data\DateTimeHelper;
use P3tite\Code\Lang\Sql\DataType;
use P3tite\Code\Lang\Sql\Attribute;

class DanglingTest extends TestCase
{
    private const TAB = "\t";

    public function testHeroes()
    {

        echo PHP_EOL;
       $bar = new \stdClass();
        $foo = new DataType();
        $desc = $foo->getTypes()['VARCHAR']->getDescription();
        foreach($foo->getTypes()->getKeys() as $key) {
            echo (new StringClass($key))->toLower()->quote();
            echo ' => ';
            echo (new StringClass($key))->quote();
            echo ',';
            echo PHP_EOL;
        }
        $this->assertInstanceOf('P3tite\Type\StringClass', $desc);

        var_dump($foo->getTypeByKey('datetime'));
    }
}
//0000  