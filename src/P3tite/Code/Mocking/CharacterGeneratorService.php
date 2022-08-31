<?php

declare(strict_types=1);
/**
 * Service implementing RFC 864 - Character Generator Protocol (CHARGEN) on application layer -> see P3tite\Communication\* for socket implementation
 * 
 * sample output:
 *  
 * <code>
 * !"#$%&'()*+,-./0123456789:;<=>?@ABCDEFGHIJKLMNOPQRSTUVWXYZ[\]^_`abcdefgh
 * "#$%&'()*+,-./0123456789:;<=>?@ABCDEFGHIJKLMNOPQRSTUVWXYZ[\]^_`abcdefghi
 * #$%&'()*+,-./0123456789:;<=>?@ABCDEFGHIJKLMNOPQRSTUVWXYZ[\]^_`abcdefghij
 * $%&'()*+,-./0123456789:;<=>?@ABCDEFGHIJKLMNOPQRSTUVWXYZ[\]^_`abcdefghijk
 * %&'()*+,-./0123456789:;<=>?@ABCDEFGHIJKLMNOPQRSTUVWXYZ[\]^_`abcdefghijkl
 * </code>
 * 
 * @see https://datatracker.ietf.org/doc/html/rfc864
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P3tite
 * @package P3tite
 * @version 0.1
 * @since 2022-08-12
 */

namespace P3tite\Code\Mocking;

use P3tite\Type\ArrayClass;
use P3tite\Type\StringClass;

class CharacterGeneratorService
{


    private const EOL = "\r\n";

    private int $min = 33;
    private int $max = 126;

    private int $windowSize = 72;


    private static int $currentCodepoint = 33;


    public function getLine(): StringClass
    {
        $line = new StringClass();
        $start = self::$currentCodepoint;
        for ($i = 0; $i < $this->windowSize; $i++) {
            $line->append(chr(self::$currentCodepoint));
            $this->setNextCodepoint();
        }
        self::$currentCodepoint = $start + 1;
        return $line->append(self::EOL);
    }

    public function getFullCharacterLine(): StringClass
    {
        $line = new StringClass();
        for ($i = $this->min; $i < $this->max + 1; $i++)
            $line->append(chr($i));
        return $line->append(self::EOL);
    }

    public function setNextCodepoint()
    {
        switch (true) {
            case $this->min <= self::$currentCodepoint && $this->max >= self::$currentCodepoint:
                self::$currentCodepoint++;
                break;

            case self::$currentCodepoint > $this->max:
            case self::$currentCodepoint < $this->min:
                self::$currentCodepoint =  $this->min;
        }
    }
}
