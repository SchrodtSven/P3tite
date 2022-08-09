<?php declare(strict_types=1);
/**
 * Temporary dummy class Foo
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P3tite
 * @package P3tite
 * @version 0.1
 */
namespace P3tite\Core;

 class Foo
 {
    public function __construct()
    {
        echo 'Hi I am: ' . __CLASS__;
    }

    public function doubleMe(int $a)
    {
        return 2*$a;    
    }
 }