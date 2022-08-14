<?php
declare(strict_types=1);
/**
 * Dynamically modified file for testing currently written code
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P3tite
 * @package P3tite
 * @version 0.1
 * @since 2022-08-14
 */

use PHPUnit\Framework\TestCase;
use P3tite\Type\Binary\Bits;

class BitsTest extends TestCase
{
    public function testBasix()
    {
        $fullByte= new Bits(255, 8);

        $this->assertSame($fullByte->getCurrentValue(), 255);
        $this->assertSame((string) $fullByte, '11111111');

        $zero = new Bits(0, 8);
        $this->assertSame((string) $zero, '00000000');
        $this->assertSame($zero->getCurrentValue(), 0);

        $kilo = new Bits(1024, 11);
        $this->assertSame((string) $kilo, '10000000000');
        $this->assertSame($kilo->getCurrentValue(), 1024);

        

    }

}