<?php

declare(strict_types=1);
/**
 * Foundation class representing SQL statements 
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
use P3tite\Core\Dry\MetaTrait;

class Query
{
    use MetaTrait;
    /**
     * public constant definitions for SQL operations
     */

    // Data definition language [DDL]
    public const CREATE = 'CREATE';

    public const ALTER = 'ALTER';

    public const DROP = 'DROP';

    // Data manipulation language [DML]
    public const SELECT = 'SELECT';

    public const INSERT = 'INSERT INTO';

    public const VALUES = 'VALUES';

    public const UPDATE = 'UPDATE';

    public const DELETE = 'DELETE';

    public const SET = 'SET';

    // Data control language [DCL]
    public const GRANT = 'GRANT';

    public const REVOKE = 'REVOKE';

    public const FROM = 'FROM';

    public const IN = 'IN';

    public const GROUP_BY = 'GROUP BY';

    public const HAVING = 'HAVING';

    public const ORDER_BY = 'ORDER BY';

    public const WHERE = 'WHERE';

    public const BETWEEN = 'BETWEEN';

    public const OP_AND = 'AND';

    public const OP_OR = 'OR';

    public const OP_NOT = 'NOT';

    public const VALID_KEY_WORDS =
    [
        'CREATE' => 'CREATE',
        'ALTER' => 'ALTER',
        'DROP' => 'DROP',
        'SELECT' => 'SELECT',
        'INSERT' => 'INSERT INTO',
        'VALUES' => 'VALUES',
        'UPDATE' => 'UPDATE',
        'DELETE' => 'DELETE',
        'SET' => 'SET',
        'GRANT' => 'GRANT',
        'REVOKE' => 'REVOKE',
        'FROM' => 'FROM',
        'IN' => 'IN',
        'GROUP_BY' => 'GROUP BY',
        'HAVING' => 'HAVING',
        'ORDER_BY' => 'ORDER BY',
        'WHERE' => 'WHERE',
        'BETWEEN' => 'BETWEEN',
        'OP_AND' => 'AND',
        'OP_OR' => 'OR',
        'OP_NOT' => 'NOT'
    ];

    /**
     * Named type of query [INSERT|UPDATE|SELECT ...]
     *
     * @var string
     */
    protected StringClass $queryType;

    /**
     * List of attributes to be involved in current query
     */
    protected ArrayClass $attributes;

    public function getValidKeyword(bool $valuesOnly = true): ArrayClass
    {
        return ($valuesOnly) ? new ArrayClass(array_values(self::VALID_KEY_WORDS)) : new ArrayClass(self::VALID_KEY_WORDS);
    }
}
