<?php

declare(strict_types=1);
/**
 * Foundation class representing SQL statements 
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P3tite
 * @package P3tite
 * @version 0.1
 * @since 2022-08-31
 */

namespace P3tite\Code\Lang\Sql;

use P3tite\Type\StringClass;
use P3tite\Type\ArrayClass;
use P3tite\Core\Dry\MetaTrait;

class Select extends Query
{
    public function __construct(string $entity, array $attributes = ['*'])
    {
        parent::__construct($entity, $attributes, self::SELECT);
        $this->updateLiteral(
            [
                $this->queryType,
                $this->attributes->join(', '),
                self::FROM,
                $this->entity
            ]
        );
    }
}
