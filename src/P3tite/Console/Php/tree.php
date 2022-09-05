#!/usr/bin/env php
<?php

declare(strict_types=1);

/**
 * Implementation of tree command in PHP for fun
 * 
 * 
 * @FIXME
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P3tite
 * @package P3tite
 * @version 0.1
 * @since 2022-09-01
 */

use P3tite\Type\StringClass;
use P3tite\Type\ArrayClass;

chdir('projects/P3tite');
require_once 'src/P3tite/Autoload.php';

class tree
{
    public function run()
    {

    }
}
(new tree())->run();