<?php
declare(strict_types=1);
/**
 * Unit testing type Bit
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P3tite
 * @package P3tite
 * @version 0.1
 * @since 2022-08-14
 */

use PHPUnit\Framework\TestCase;
use P3tite\Type\Binary\Bit;

class BitTest extends TestCase
{
    public function testBasix()
    {
        $zero = new Bit(false);
        $one = new Bit(true);

        $this->assertSame((string) $zero, '0');
        $this->assertSame((string) $one, '1');

        $this->assertTrue($zero->getCurrentValue() === false);
        $this->assertTrue($one->getCurrentValue() === true);

        $zero->not();
        $one->not();

        $this->assertSame((string) $zero, '1');
        $this->assertSame((string) $one, '0');

        $this->assertTrue($zero->getCurrentValue() === true);
        $this->assertTrue($one->getCurrentValue() === false);

    }
}