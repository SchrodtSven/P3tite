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
use P3tite\Code\GenericPart;
use phpDocumentor\Reflection\DocBlock\Tags\Generic;

class GenericPartTest extends UnitTest
{
    public function testAssignmentEmbracingCombination()
    {
        $foo = new GenericPart();
        $bar = $foo->getAssignment('foo', 42);
        $bar = $foo->getAssignmentList(new ArrayClass([
            'foo' => 99,
            'Bar' => 'Lorem Ispum',
            'Baz' => 4.23,
            '$dollar' => '€'
        ]));
        $bar->embrace(GenericPart::BRACE_STYLE_SQUARE_BRACKETS);
        $this->assertTrue($bar instanceof GenericPart);
        $this->assertSame((string) $bar, "[foo = 99, Bar = 'Lorem Ispum', Baz = 4.23, \$dollar = '€']");


        $bar = $foo->getAssignmentList(
            new ArrayClass([
                'foo' => 99,
                'Bar' => 'Lorem Ispum',
                'Baz' => 4.23,
                'franc' => '€'
            ]),
            ' AND '
        );
        $bar->embrace();
        $this->assertTrue($bar instanceof GenericPart);
        $this->assertSame((string) $bar, "(foo = 99 AND Bar = 'Lorem Ispum' AND Baz = 4.23 AND franc = '€')");



        $bar = $foo->getAssignmentList(
            new ArrayClass([
                'foo' => 99,
                'Bar' => 'Lorem Ispum',
                'Baz' => 4.23,
                'franc' => '€'
            ]),
            ', ',
            ' => '
        );
       $bar->embrace(GenericPart::BRACE_STYLE_CURLY_BRACES);
        $this->assertTrue($bar instanceof GenericPart);
        $this->assertSame((string) $bar, "{foo => 99, Bar => 'Lorem Ispum', Baz => 4.23, franc => '€'}");
    }
}
