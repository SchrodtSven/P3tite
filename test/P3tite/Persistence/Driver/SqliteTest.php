<?php

declare(strict_types=1);
/**
 *  
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P3tite
 * @package P3tite
 * @version 0.1
 * @since 2022-08-14
 */

use PHPUnit\Framework\TestCase;
use P3tite\Persistence\Driver\Sqlite;
use phpDocumentor\Reflection\DocBlock\Tags\Var_;

class SqliteTest extends TestCase
{

    private Sqlite $pdo; 

    public function setUp(): void
    {
        $this->pdo = new Sqlite();
    }

    public function testConnecting()
    {
     $this->assertInstanceOf('P3tite\Persistence\Driver\Sqlite', $this->pdo);
    }


    public function testCreateTables()
    {
       $this->createTables();
       $foo = $this->getTableList();
       $this->assertTrue(is_array($foo));
    
    }

    public function createTables() {
        $commands = ['CREATE TABLE IF NOT EXISTS projects (
                        project_id   INTEGER PRIMARY KEY,
                        project_name TEXT NOT NULL
                      )',
                      'CREATE TABLE IF NOT EXISTS project_member (
                        project_id   INTEGER PRIMARY KEY,
                        project_name TEXT NOT NULL
                      )',
            'CREATE TABLE IF NOT EXISTS tasks (
                    task_id INTEGER PRIMARY KEY,
                    task_name  VARCHAR (255) NOT NULL,
                    completed  INTEGER NOT NULL,
                    start_date TEXT,
                    completed_date TEXT,
                    project_id VARCHAR (255),
                    FOREIGN KEY (project_id)
                    REFERENCES projects(project_id) ON UPDATE CASCADE
                                                    ON DELETE CASCADE)'];
        // execute the sql commands to create new tables
        foreach ($commands as $command) {
            $this->pdo->execute($command);
        }

        $d00 = $this->pdo->getRawPdo()->query('select sqlite_version();');
       
    }

    /**
     * get the table list in the database
     */
    public function getTableList() {

        $stmt = $this->pdo->getRawPdo()->query("SELECT name
                                   FROM sqlite_master
                                   WHERE type = 'table'
                                   ORDER BY name");
        $tables = [];
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $tables[] = $row['name'];
        }

        return $tables;
    }
}
