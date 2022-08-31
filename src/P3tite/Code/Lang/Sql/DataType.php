<?php

declare(strict_types=1);
/**
 * Class managing meta data for dql data types 
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P3tite
 * @package P3tite
 * @version 0.1
 * @since 2022-08-29
 */

namespace P3tite\Code\Lang\Sql;

use P3tite\Type\StringClass;
use P3tite\Type\ArrayClass;
use P3tite\Code\Lang\Sql\Attribute;

class DataType
{

    private ArrayClass $types;

    private ArrayClass $indices;

    public function __construct()
    {
        $this->init();
    }

    private function init()
    {
        $this->types = new ArrayClass(
            []
        );

        $this->types['bit'] = (new Attribute('bit', '0', '1', 'Numeric data type: 0 ... 1'));
        $this->types['tinyint'] = (new Attribute('tinyint', '0', '255', 'Numeric data type: 0 ... 255'));
        $this->types['smallint'] = (new Attribute('smallint', '-32,768', '32,767', 'Numeric data type: -32,768 ... 32,767'));
        $this->types['int'] = (new Attribute('int', '-2,147,483,648', '2,147,483,647', 'Numeric data type: -2,147,483,648 ... 2,147,483,647'));
        $this->types['bigint'] = (new Attribute('bigint', '-9,223,372,036, 854,775,808', '9,223,372,036, 854,775,807', 'Numeric data type: -9,223,372,036, 854,775,808 ... 9,223,372,036, 854,775,807'));
        $this->types['decimal'] = (new Attribute('decimal', '-10^38 +1', '10^38 -1', 'Numeric data type: -10^38 +1 ... 10^38 -1'));
        $this->types['numeric'] = (new Attribute('numeric', '-10^38 +1', '10^38 -1', 'Numeric data type: -10^38 +1 ... 10^38 -1'));
        $this->types['float'] = (new Attribute('float', '-1.79E + 308', '1.79E + 308', 'Numeric data type: -1.79E + 308 ... 1.79E + 308'));
        $this->types['real'] = (new Attribute('real', '-3.40E + 38', '3.40E + 38', 'Numeric data type: -3.40E + 38 ... 3.40E + 38'));
        $this->types['DATE'] = (new Attribute('DATE', null, null, 'Stores date in the format YYYY-MM-DD'));
        $this->types['TIME'] = (new Attribute('TIME', null, null, 'Stores time in the format HH:MI:SS'));
        $this->types['DATETIME'] = (new Attribute('DATETIME', null, null, 'Stores date and time information in the format YYYY-MM-DD HH:MI:SS'));
        $this->types['TIMESTAMP'] = (new Attribute('TIMESTAMP', null, null, 'Stores number of seconds passed since the Unix epoch (‘1970-01-01 00:00:00’ UTC)'));
        $this->types['YEAR'] = (new Attribute('YEAR', null, null, 'Stores year in 2 digits or 4 digit format. Range 1901 to 2155 in 4-digit format. Range 70 to 69, representing 1970 to 2069.'));
        $this->types['CHAR'] = (new Attribute('CHAR', null, null, 'Fixed length with a maximum length of 8,000 characters'));
        $this->types['VARCHAR'] = (new Attribute('VARCHAR', null, null, 'Variable-length storage with a maximum length of 8,000 characters'));
        $this->types['VARCHAR(max)'] = (new Attribute('VARCHAR(max)', null, null, 'Variable-length storage with provided max characters, not supported in MySQL'));
        $this->types['TEXT'] = (new Attribute('TEXT', null, null, 'Variable-length storage with maximum size of 2GB data'));
        $this->types['NCHAR'] = (new Attribute('NCHAR', null, null, 'Fixed length with maximum length of 4,000 characters'));
        $this->types['NVARCHAR'] = (new Attribute('NVARCHAR', null, null, 'Variable-length storage with a maximum length of 4,000 characters'));
        $this->types['NVARCHAR(max)'] = (new Attribute('NVARCHAR(max)', null, null, 'Variable-length storage with provided max characters'));
        $this->types['NTEXT'] = (new Attribute('NTEXT', null, null, 'Variable-length storage with a maximum size of 1GB data'));
        $this->types['BINARY'] = (new Attribute('BINARY', null, null, 'Fixed length with a maximum length of 8,000 bytes'));
        $this->types['VARBINARY'] = (new Attribute('VARBINARY', null, null, 'Variable-length storage with a maximum length of 8,000 bytes'));
        $this->types['VARBINARY(max)'] = (new Attribute('VARBINARY(max)', null, null, 'Variable-length storage with provided max bytes'));
        $this->types['IMAGE'] = (new Attribute('IMAGE', null, null, 'Variable-length storage with maximum size of 2GB binary data'));
        $this->types['CLOB'] = (new Attribute('CLOB', null, null, 'Character large objects that can hold up to 2GB'));
        $this->types['BLOB'] = (new Attribute('BLOB', null, null, 'For binary large objects'));
        $this->types['XML'] = (new Attribute('XML', null, null, 'For storing XML data'));
        $this->types['JSON'] = (new Attribute('JSON', null, null, 'For storing JSON data'));

        $this->indices = new ArrayClass(
            [
                'bit' => 'bit',
                'tinyint' => 'tinyint',
                'smallint' => 'smallint',
                'int' => 'int',
                'bigint' => 'bigint',
                'decimal' => 'decimal',
                'numeric' => 'numeric',
                'float' => 'float',
                'real' => 'real',
                'date' => 'DATE',
                'time' => 'TIME',
                'datetime' => 'DATETIME',
                'timestamp' => 'TIMESTAMP',
                'year' => 'YEAR',
                'char' => 'CHAR',
                'varchar' => 'VARCHAR',
                'varchar(max)' => 'VARCHAR(max)',
                'text' => 'TEXT',
                'nchar' => 'NCHAR',
                'nvarchar' => 'NVARCHAR',
                'nvarchar(max)' => 'NVARCHAR(max)',
                'ntext' => 'NTEXT',
                'binary' => 'BINARY',
                'varbinary' => 'VARBINARY',
                'varbinary(max)' => 'VARBINARY(max)',
                'image' => 'IMAGE',
                'clob' => 'CLOB',
                'blob' => 'BLOB',
                'xml' => 'XML',
                'json' => 'JSON'
            ]
        );
    }

    /**
     * Get the value of types
     *
     * @return ?ArrayClass
     */
    public function getTypes(): ?ArrayClass
    {
        return $this->types;
    }

    /**
     * Set the value of types
     *
     * @param ?ArrayClass $types
     *
     * @return self
     */
    public function setTypes(?ArrayClass $types): self
    {
        $this->types = $types;

        return $this;
    }

    /**
     * Getting Attribute instance for $key (case insensitive, if exists or null)
     * @param string $key
     * 
     * @return Attribute
     */
    public function getTypeByKey(string $key): ?Attribute
    {
        return ($this->types[$this->indices[strtolower($key)]]) ?? null;
    }
}
