<?php

declare(strict_types=1);
/**
 * Interface defining public API for persistence drivers
 *
 *   
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P3tite
 * @package P3tite
 * @version 0.1
 * @since 2022-08-23
 */

namespace P3tite\Persistence\Driver;

interface DriverInterface
{

    public function __construct(string $dsn = null);
    public function connect(string $dsn);
    public function execute(string $sql);
    public function getRawPdo();


}