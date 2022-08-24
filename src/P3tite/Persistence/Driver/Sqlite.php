<?php

declare(strict_types=1);
/**
 * Driver class for PDO instances of Sqlite3 databases
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

class Sqlite implements DriverInterface
{

    private ?\PDO $pdo = null;

    private ?\PDOStatement $lastStatement = null;

    public const PATH_2_FILE = 'src/P3tite/Application/App/data/data.db';


    public function __construct(string $dsn = null)
    {
        if (is_null($dsn)) {
            $dsn = 'sqlite:' . self::PATH_2_FILE;
        }
        $this->connect($dsn);
    }

    public function connect(string $dsn): self
    {

        $this->pdo = new \PDO($dsn);
        return $this;
    }

    public function query(string $sql): self
    {
        $this->lastStatement =  $this->pdo->query($sql);
        return $this;
    }

    public function execute(string $sql): self
    {
        $this->pdo->exec($sql);
        return $this;
    }

    public function getRawPdo(): \Pdo
    {
        return $this->pdo;
    }

    public function fetchAll(int $mode = \PDO::FETCH_CLASS, string $class = 'stdClass', ?array $constructorArgs = null)
    {
        return $this->lastStatement->fetchAll($mode, $class, $constructorArgs);
    }
}
