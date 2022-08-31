<?php

declare(strict_types=1);
/**
 * Dynamically temporary modified file for testing currently written code
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P3tite
 * @package P3tite
 * @version 0.1
 * @since 2022-08-24
 */

use P3tite\Type\StringClass;
use P3tite\Type\ArrayClass;
use PHPUnit\Framework\TestCase;
use P3tite\Code\Mocking\RandomData;
use P3tite\Type\Binary\Byte;
use P3tite\Data\DateTimeHelper;


class DateTimeHelperTest extends TestCase
{
    public function testBasix()
    {
        $helper = new DateTimeHelper();
        $old = $helper->getDateFromTimeStamp(12345);
        $this->assertInstanceOf('DateTime', $old);
        


        $new = $helper->getDateFromString('2022-08-24 10:23:42');
        $this->assertInstanceOf('DateTime', $new);
        $this->assertTrue($new->format('Y') === '2022');


        
    }
}
//0000  