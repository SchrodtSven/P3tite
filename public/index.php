<?php declare(strict_types=1);
/**
 * Bootstrapping in document root
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P3tite
 * @package P3tite
 * @version 0.1
 */

 require_once '../src/P3tite/Autoload.php';
 chdir('../');
 
 $me = new \P3tite\Core\Foo();
 var_dump($me);