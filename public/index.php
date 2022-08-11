<?php

declare(strict_types=1);

/**
 * Bootstrapping in document root
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P3tite
 * @package P3tite
 * @version 0.1
 * @since 2022-08-09
 */
//die(getcwd());
//  require_once '../src/P3tite/Autoload.php';
require_once 'src/P3tite/Autoload.php';
//chdir('../');
use P3tite\Communication\Http\Response;
use P3tite\Communication\Http\Request;
use P3tite\Mvc\FrontController;


new FrontController(new Request(), new Response());

