<?php

declare(strict_types=1);
/**
 * Dynamically temporary modified file for testing currently written code
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P3tite
 * @package P3tite
 * @version 0.1
 * @since 2022-08-12
 */

use P3tite\Type\StringClass;
use P3tite\Type\ArrayClass;
use P3tite\Core\Testing\UnitTest;
use P3tite\Code\Mocking\RandomData;
use P3tite\Type\Binary\Byte;
use P3tite\Data\DateTimeHelper;
use P3tite\Code\Lang\Sql\DataType;
use P3tite\Code\Lang\Sql\Attribute;
use P3tite\Code\Mocking\CharacterGeneratorService;
use P3tite\Code\Lang\Sql\Query;

class DanglingTest extends UnitTest
{


  private const TAB = "\t";
  private const EOL = "\r\n";
  private int $min = 32;
  private int $max = 126;

  public function testHeroes()
  {
    $parsed = new ArrayClass();
    echo getcwd();
    $this->assertTrue(2 === 1 + 1);
    //die('FOO:: ' . $this->max  -$this->min);
  }
}
//0000  