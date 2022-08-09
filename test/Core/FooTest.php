<?php declare(strict_types=1);
/**
 * Unit testing Foo 
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P3tite
 * @package P3tite
 * @version 0.1
 */

use PHPUnit\Framework\TestCase;

class FooTest extends TestCase
{
    public function testDouble()
    {
        $bar = new \P3tite\Core\Foo();
        $this->assertTrue($bar->doubleMe(45) === 90);
    }
}