<?php

declare(strict_types=1);
/**
 * Class representing http protocol
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P3tite
 * @package P3tite
 * @version 0.1
 * @since 2022-08-09
 * 
 */

namespace P3tite\Communication\Http;

use P3tite\Type\ArrayClass;
use P3tite\Type\StringClass;

class Protocol
{
    public const MESSAGE_SEPARATOR = "\r\n\r\n"; //<CR><LF><CR><LF>

    public const LINE_SEPARATOR = "\r\n";
}