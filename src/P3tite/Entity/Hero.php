<?php

declare(strict_types=1);
/**
 * Entity class for instances of (super) hero personalities
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P3tite
 * @package P3tite
 * @version 0.1
 * @since 2022-08-12
 */

namespace P3tite\Entity;

use P3tite\Type\StringClass;
use P3tite\Type\ArrayClass;

class Hero
{

    // @TODO list to be continued
    private const VALID_FRANCHISES = [
        'Marvel',
        'DC',
        'others'
    ];

    // @TODO list to be continued
    private const VALID_STATUSES = [
        'alive',
        'dead',
        'unknown',

    ];

    // @TODO list to be continued
    private const VALID_SPECIES = [
        'human',
        'god',
        'kree',
        'skrull',
        'kryptonian',
        'werewolf'

    ];

    private StringClass $firstName = '';
    private ArrayClass $midNames = '';
    private StringClass $lastName = '';
    private StringClass $gender = '';

    /**
     * Hint: Amphiprion ocellaris is one species of clownfish. Many species of fish are endangered by overfishing
     */
    private StringClass $species = '';

    private StringClass $secretIdenty = '';

    private ArrayClass $aliases;

    private ArrayClass $superPowers;

    private ArrayClass $powers;

    private ArrayClass $famousWords;

    private StringClass $famousLastWords = '';

    private StringClass $status;

    private ArraClass $origin;


    

    /**
     * Get the value of firstName
     */ 
    public function getFirstName(): StringClass
    {
        return $this->firstName;
    }

    /**
     * Set the value of firstName
     *
     * @return  self
     */ 
    public function setFirstName(string $firstName)
    {
        $this->firstName = new StringClass($firstName);

        return $this;
    }

    /**
     * Get the value of midNames
     *
     * @return ArrayClass
     */
    public function getMidNames(): ArrayClass
    {
        return $this->midNames;
    }

    /**
     * Set the value of midNames
     *
     * @param ArrayClass $midNames
     *
     * @return self
     */
    public function setMidNames(ArrayClass $midNames): self
    {
        $this->midNames = $midNames;

        return $this;
    }
}
