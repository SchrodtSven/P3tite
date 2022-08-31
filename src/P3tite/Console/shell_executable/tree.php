#!/usr/bin/env php
<?php

declare(strict_types=1);

/**
 * Implementation of tree command in PHP for fun and caus' missing -exludeDir param
 * 
 * 
 * @FIXME
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P3tite
 * @package P3tite
 * @version 0.1
 * @since 2022-08-31
 */

use P3tite\Type\StringClass;
use P3tite\Type\ArrayClass;

chdir('projects/P3tite');
require_once 'src/P3tite/Autoload.php';

$start = '../P3tite';
$it = new RecursiveDirectoryIterator($start);

// Loop through files
foreach (new RecursiveIteratorIterator($it) as $file) {
    $foo = new StringClass((string) $file);
    if (!$foo->starts('./vendor') && !$foo->starts('.git') && (string) $foo != '.' && (string) $foo != '..') {
        echo $file . PHP_EOL;
    }
}


 //
