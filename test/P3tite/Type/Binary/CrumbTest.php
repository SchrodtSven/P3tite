<?php

declare(strict_types=1);
/**
 * Testing Crumb class
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P3tite
 * @package P3tite
 * @version 0.1
 * @since 2022-08-14
 */

use PHPUnit\Framework\TestCase;
use P3tite\Type\Binary\Crumb;

class CrumbTest extends TestCase
{
    /**
     * @dataProvider intProvider
     */
    public function testBasix(int $input, int $expected, string $binaryLiteral)
    {
        $bar = new Crumb($input);
        $this->assertTrue($bar->getCurrentValue() === $expected);
        $this->assertTrue($bar->getMaxValue() === 3);
        $this->assertTrue($bar->getMinValue() === 0);
        $this->assertTrue((string) $bar === $binaryLiteral);
    }

    public function intProvider()
    {
        return [
            [0, 0, '00'],
            [1, 1, '01'],
            [2, 2, '10'],
            [3, 3, '11']
        ];
    }
}
