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

    private const POPE = 666;

    /**
     * @dataProvider doubleProvider
     */
    public function testDouble(int  $input, int $expected): void
    {
        $bar = new \P3tite\Core\Foo();
        $this->assertTrue($bar->doubleMe($input) === $expected);
         
    }

    public function testGod()
    {
        $this->assertSame(self::POPE, 2* 333);
    }

    public function doubleProvider(): array
    {
        return [
            [0, 0],
            [1, 2],
            [99, 198],
            [5, 10]
        ];
    }
}