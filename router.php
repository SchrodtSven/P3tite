<?php

declare(strict_types=1);
/**
 *  router.php - to be used with PHP 8.* Development Server 
 *
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P3tite
 * @package P3tite
 * @version 0.1
 * @since 2022-08-09
 */

/*
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if (file_exists($_SERVER['DOCUMENT_ROOT'] . $path)) {
    return false;
} else {
    $_SERVER['SCRIPT_NAME'] = 'index.php';
    require_once 'public/index.php';
}
*/


if (!file_exists($_SERVER['DOCUMENT_ROOT'] . parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH))) {
    $_SERVER['SCRIPT_NAME'] = 'index.php';
    require_once 'public/index.php';
} else {
    return false;
}
