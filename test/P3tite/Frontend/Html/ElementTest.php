<?php

declare(strict_types=1);
/**
 *AttributeSelector - class representing attribute selector(s)
 *
 *  <code>
 * font-family: Comic sans, Gargoyle
 *  </code>
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P3tite
 * @package P3tite
 * @version 0.1
 * @since 2022-08-15
 */

namespace P3tite\Frontend\StyleSheet;

use P3tite\Type\StringClass;
use P3tite\Frontend\Html\Element;
use P3tite\Type\ArrayClass;
use PHPUnit\Framework\TestCase;

class ElementTest extends TestCase
{

    /**
     * @dataProvider fooProvider
     */
    public function testBasix(string $elementName, string $content, string $expectedOutput)
    {
        $foo = new Element($elementName, $content);
        $startTag = "<$elementName>";
        $endTag = "</$elementName>";
        
        $this->assertInstanceOf('P3tite\Frontend\Html\Element' ,$foo);
        $this->assertSame((string) $foo,  $expectedOutput);

        $foo->addClass('superHeroKillerWhoIsNotAGod');
        $this->assertSame((string) $foo, '<h1 class="superHeroKillerWhoIsNotAGod">Foo</h1>');
    }

    public function fooProvider(): array
    {
        return [
            [
                'h1', 'Foo', '<h1>Foo</h1>',
                'p', 'Bar', '<p>Bar</p>'

            ]
        ];
    }
}