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
use P3tite\Code\Lang\Sql\Select;

class SelectTest extends UnitTest
{

    public function testBasix()
    {
         $foo = new Select('projects', ['id', 'first','mid', 'last', 'foo', 'bar', 'baz', 'dob']);
        $foo->where(new ArrayClass(['id' =>2500, 'name' => "LIKE 'Fo%'"])    );
        //echo $foo;
         $this->assertInstanceOf('P3tite\Code\Lang\Sql\Select', $foo);
    }
}
