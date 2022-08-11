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

use P3tite\Communication\Http\Request;
use P3tite\Mvc\Router;
 $req = new Request();
 var_dump($req);
$router = new Router($req);
var_dump($router);
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
var_dump($path);
var_dump($_SERVER['REQUEST_URI']);
//'https://G0d:n1mdA@L0k1.example.org/Foo/bar/id/999?id=69696#topContent'
 var_dump(parse_url($_SERVER['REQUEST_URI']));