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
use P3tite\Frontend\StyleSheet\AttributeSelector;

class AttributeSelectorTest extends TestCase
{
    private AttributeSelector $selector;

    public function setUp(): void
    {
        $this->selector = new AttributeSelector();
    }

    /**
     * @dataProvider getDataForTestAttributeSelectorHas
     *
     * @param string $a
     * @param string $b
     * @return void
     */
    public function testAttributeSelectorHas(string $a, string $b): void
    {
        $this->assertSame(
            (string) $this->selector->has($a),
            $b
        );
    }

    /**
     * @dataProvider getDataForTestAttributeSelectorEquals
     *
     * @param string $a
     * @param string $b
     * @param string $c
     * @return void
     */
    public function testAttributeSelectorEquals(string $a, string $b, string $c): void
    {
        $this->assertSame(
            (string) $this->selector->equals($a, $b),
            $c
        );
    }

    /**
     * @dataProvider getDataForTestAttributeSelectorContains
     *
     * @param string $a
     * @param string $b
     * @param string $c
     * @return void
     */
    public function testAttributeSelectorContains(string $a, string $b, string $c): void
    {
        $this->assertSame(
            (string) $this->selector->contains($a, $b),
            $c
        );
    }

    /**
     * @dataProvider getDataForTestAttributeSelectorBegins
     *
     * @param string $a
     * @param string $b
     * @param string $c
     * @return void
     */
    public function testAttributeSelectorBegins(string $a, string $b, string $c): void
    {


        $this->assertSame(
            (string) $this->selector->begins($a, $b),
            $c
        );
    }

    /**
     * @dataProvider getDataForTestAttributeSelectorEnds
     *
     * @param string $a
     * @param string $b
     * @param string $c
     * @return void
     */
    public function testAttributeSelectorEnds(string $a, string $b, string $c): void
    {
        $this->assertSame(
            (string) $this->selector->ends($a, $b),
            $c
        );
    }

    /**
     * @dataProvider getDataForTestAttributeSelectorGeneric
     *
     * @FIXME -> @see getDataForTestAttributeSelectorGeneric()
     * @param string $a
     * @param string $b
     * @param string $c
     * @param string $d
     * @return void
     */
    public function NotestAttributeSelectorGeneric(string $a, string $b, string $c, string $d): void
    {
        $this->assertSame(
            (string) $this->selector->generic($a, $b, $c),
            $d
        );
    }


    /**
     * @return array
     */
    public function getDataForTestAttributeSelectorHas(): array
    {
        return [
            ['id', '[id]'],
            ['title', '[title]'],
            ['class', '[class]'],
            ['lang', '[lang]']
        ];
    }


    /**
     * @return array
     */
    public function getDataForTestAttributeSelectorEquals(): array
    {
        return[
            ['lang', 'de', '[lang=de]']
        ];
    }


    /**
     * @return array
     */
    public function getDataForTestAttributeSelectorContains(): array
    {
        return[
            ['id', 'admin', '[id~=admin]']
        ];
    }


    /**
     * @return array
     */
    public function getDataForTestAttributeSelectorBegins(): array
    {
        return[
            ['title', 'Lonely', '[title^=Lonely]']
        ];
    }


    /**
     * @return array
     */
    public function getDataForTestAttributeSelectorEnds(): array
    {
        //
        return[
            ['title', 'Lonely', '[title$=Lonely]']
        ];
    }


    /**
     * @FIXME <code>
     * var_dump(['title', '*', 'Lonely', '[title*Lonely]');
     *
     * /*
     * array(4) {
     [0]=>
     string(5) "title"
     [1]=>
     string(1) "*"
     [2]=>
     string(6) "Lonely"
     [3]=>
     string(14) "[title*Lonely]"
     }
     * echo count(['title', '*', 'Lonely', '[title*Lonely]']);
     * 4
     * --> ArgumentCountError: 4 arguments are required, 3 given
     *
     *
     * </code>
     * @hint var()
     * @return array
     */
    public function getDataForTestAttributeSelectorGeneric(): array
    {

        return[
            ['title', '*', 'Lonely', '[title*Lonely]'],
            ['title', '!', 'Lonely', '[title!Lonely]']
        ];
    }
}