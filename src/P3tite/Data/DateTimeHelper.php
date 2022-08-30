<?php

declare(strict_types=1);
/**
 * Helper class converting literal date(time) representation (string, timestamps, etc.) to \DateTime instances and vice versa 
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P3tite
 * @package P3tite
 * @version 0.1
 * @since 2022-08-24
 */

namespace P3tite\Data;

use P3tite\Type\StringClass;
use P3tite\Type\ArrayClass;
use DateTime;

class DateTimeHelper
{
    public const DEFAULT_FORMAT = 'Y-m-d H:i:s';

    public function getDateFromString(string $datetime, string $format = self::DEFAULT_FORMAT): DateTime
    {
        return DateTime::createFromFormat($format, $datetime);
    }

    public function getDateFromTimeStamp(int $timestamp): DateTime
    {
        return (new DateTime())->setTimestamp($timestamp);
    }

    public function getDateFromInput(mixed $input): ?DateTime
    {
        switch (gettype($input)) {
            case 'integer':
                return $this->getDateFromTimeStamp($input);
                break;

            case 'string':
                return $this->getDateFromstring($input);
                break;

            default:
                return null;
        }
    }
}
