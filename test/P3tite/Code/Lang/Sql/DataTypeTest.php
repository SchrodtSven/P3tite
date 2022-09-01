<?php

declare(strict_types=1);
/**
 * Unit testing DataTypes
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
use P3tite\Code\Lang\Sql\DataType;
use P3tite\Code\Lang\Sql\Attribute;

 
 

class DataTypeTest extends UnitTest
{
    public function testBasix()
    {
        $foo = new DataType();
        $this->assertInstanceOf('P3tite\Type\ArrayClass', $foo->getTypes());
        foreach($foo->getTypes()->getKeys() as $item) {
            $attr = $foo->getTypeByKey($item);
            $this->assertInstanceOf('P3tite\Code\Lang\Sql\Attribute', $attr);
            $this->assertInstanceOf('P3tite\Type\StringClass', $attr->getType());
            $this->assertInstanceOf('P3tite\Type\StringClass', $attr->getDescription());
        }

        $this->assertInstanceOf('P3tite\Code\Lang\Sql\DataType', $foo->setTypes(new ArrayClass()));
        $this->assertTrue(count($foo->getTypes()) === 0);

    }
}