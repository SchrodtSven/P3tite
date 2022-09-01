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
use P3tite\Type\Operational\Transformer;
use P3tite\Code\GenericPart;

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

    public const COMMENT_PREFIX = '-- ';

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
     * @var StringClass $queryType;
     */
    protected StringClass $queryType;

    /**
     * Name of current entity (“table”)
     * 
     * @var StringClass $entity
     */
    protected StringClass $entity;

    /**
     * List of attributes to be involved in current query
     * 
     * @var ArrayClass $attributes
     */
    protected ArrayClass $attributes;

    /**
     * Literal for current query as instance
     */
    protected StringClass $literal;

    /**
     * @var Transformer $transformer
     */
    protected Transformer $transformer;

    protected ArrayClass $where;

    public function __construct(string $entity, array $attributes = ['*'], string $queryType = self::SELECT)
    {
        $this->queryType = new StringClass($queryType);
        $this->entity = new StringClass($entity);
        $this->attributes = new ArrayClass($attributes);
        $this->transformer = new Transformer();
    }


    /**
     * 
     */
    public function getValidKeyword(bool $valuesOnly = true): ArrayClass
    {
        return ($valuesOnly) ? new ArrayClass(array_values(self::VALID_KEY_WORDS)) : new ArrayClass(self::VALID_KEY_WORDS);
    }

    public function __toString(): string
    {
        return (string) $this->literal;
    }

    public function updateLiteral(array $parts): self
    {
        $tmp = new ArrayClass();
        for ($i = 0; $i < count($parts); $i++) {
            $tmp->push($this->transformer->mixedToString($parts[$i]));
        }
        $this->literal = $tmp->join(' ');
        return $this;
    }

    public function where(ArrayClass $where)
    {
        $this->where = $where;
        $this->literal
            ->append(self::WHERE, StringClass::SPACE_MODE_BOTH)
            ->append(
                (string) (new GenericPart())->getAssignmentList(
                    $where,
                    ' AND '
                )
            );
    }
}
