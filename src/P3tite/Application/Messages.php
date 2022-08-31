<?php

declare(strict_types=1);
/**
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P3tite
 * @package P3tite
 * @version 0.1
 * @since 2022-08-31
 */


namespace P3tite\Application;


class Messages
{
    public const WELCOME =
        <<<MSG
        Welcome to %s
        Usage: %s
        the time is now: %s
        & 2 seconds...
        
        MSG;

    public function welcome(string $name, string $usage)
    {
        return sprintf(self::WELCOME, $name, $usage, date('Y-m-d H:i:s'));
    }
}