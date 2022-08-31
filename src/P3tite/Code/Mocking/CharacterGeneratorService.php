<?php

declare(strict_types=1);
/**
 * Service implementing RFC 864 - Character Generator Protocol (CHARGEN) 
 * 
 * example output:
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

class CharacterGeneratorService
{


    private const EOL = "\r\n";

    private int $min = 33;
    private int $max = 126;

    private int $windowSize = 72;

    private int $udpPort = 19;

    private int $tcpPort = 19;

    private static int $currentCodepoint = 33;


    public function getLine(): string
    {
        $line = '';
        $start = self::$currentCodepoint;
        for ($i = 0; $i < $this->windowSize; $i++) {
            $line .= chr(self::$currentCodepoint);
            //echo self::$currentCodepoint     . ' :: ' . chr(self::$currentCodepoint) . PHP_EOL;
            $this->setNextCodepoint();      
        }
        self::$currentCodepoint = $start+1;
        return $line . self::EOL;
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

// Character Generator Protocol