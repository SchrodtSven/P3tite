<?php

declare(strict_types=1);
/**
 * (Later abstract) foundation class for instances of (RDBM) entities
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P3tite
 * @package P3tite
 * @version 0.1
 * @since 2022-08-24
 */

namespace P3tite\Entity;

use DateTime;
use P3tite\Type\StringClass;
use P3tite\Type\ArrayClass;
use P3tite\Data\DateTimeHelper;

class BasicEntity
{

    protected DateTimeHelper $dateTimeHelper;

    public function __construct(protected int $id = 0, protected ?\DateTime $created = null, protected ?\DateTime $modified = null)
    {
        $this->dateTimeHelper = new DateTimeHelper();
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of created
     *
     * @return ?\DateTime
     */
    public function getCreated(): ?\DateTime
    {
        return $this->created;
    }

    /**
     * Set the value of created
     *
     * @param \DateTime $created
     *
     * @return self
     */
    public function setCreated(\DateTime $created): self
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get the value of modified
     *
     * @return ?\DateTime
     */
    public function getModified(): ?\DateTime
    {
        return $this->modified;
    }

    /**
     * Set the value of modified
     *
     * @param \DateTime $modified
     *
     * @return self
     */
    public function setModified(\DateTime $modified): self
    {
        $this->modified = $modified;

        return $this;
    }

    /**
     * Update modification date to current datetime
     */
    public function touch(): self
    {
        $this->modified = new DateTime();
        return $this;
    }

    public function __set(string $name, mixed $value): void
    {
        if ($value === null)
            return;

        switch ($name) {

            case 'id':
                $this->id = (int) $value;
                break;

            case 'created':
                $this->setCreated($this->dateTimeHelper->getDateFromInput($value));
                break;

            case 'modified':
                $this->setModified($this->dateTimeHelper->getDateFromInput($value));
                break;
        }
    }
}
