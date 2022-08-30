<?php

declare(strict_types=1);
/**
 * Unit testing DataTypes
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P3tite
 * @package P3tite
 * @version 0.1
 * @since 2022-08-12
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
        foreach($foo->getTypes()->getKeys() as $item) {
            $this->assertInstanceOf('P3tite\Code\Lang\Sql\Attribute', $foo->getTypeByKey($item));
        }

    }
}