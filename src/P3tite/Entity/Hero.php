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
        'schroedinger'

    ];

    // @TODO list to be continued
    private const VALID_SPECIES = [
        'human',
        'god',
        'kree',
        'skrull',
        'kryptonian',
        'werewolf',
        'vampire',
        'inhuman',
        'mutant'

    ];

    private ?StringClass $firstName = null;
   
    private ?ArrayClass $midNames = null;
   
    private ?StringClass $lastName = null;
   
    private ?StringClass $gender = null;
   
    private ?StringClass $title = null;
   
    private ?StringClass $education = null;
   
    private ?StringClass $franchise = null;

    /**
     * Hint: /Amphiprion ocellaris/ is *one species* of _clownfish_. 
     * *Many species* of /fish/ are _endangered by overfishing_
     */
    private ?StringClass $species = null;

    private ?StringClass $secretIdentity = null;

    private ?ArrayClass $aliases = null;

    private ?ArrayClass $superPowers = null;

    private ?ArrayClass $powers = null;

    private ?ArrayClass $famousWords = null;

    private ?StringClass $famousLastWords = null;

    private ?StringClass $status = null;

    private ?ArrayClass $origin = null;






    public function __construct(string $name, $properties = [])
    {
        $this->parseName($name);
        if (count($properties)) {
            $this->parseRawData($properties);
        }
    }

    protected function parseRawData(array $data)
    {
        //FOO(); 
        //@FIXME -  --> write & use \P3tite\Core\Dry\*Trait
    }

    protected function parseName(string $name)
    {
        $tmp = (new StringClass($name))->splitBy(' ');

        // handle 0 ++1 

        $this->setFirstName(new StringClass($tmp->shift()));
        if (count($tmp)) {
            $this->setLastName(new StringClass($tmp->pop()));
            if (count($tmp))
                $this->setMidNames($tmp);
        }
    }

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
    public function setFirstName(?StringClass $firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get the value of midNames
     *
     * @return ArrayClass
     */
    public function getMidNames(): ?ArrayClass
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

    public function addMidname(string $name)
    {
        $this->midNames->push(new StringClass($name));
    }

    /**
     * Get the value of lastName
     *
     * @return ?StringClass
     */
    public function getLastName(): ?StringClass
    {
        return $this->lastName;
    }

    /**
     * Set the value of lastName
     *
     * @param ?StringClass $lastName
     *
     * @return self
     */
    public function setLastName(?StringClass $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get the value of gender
     *
     * @return ?StringClass
     */
    public function getGender(): ?StringClass
    {
        return $this->gender;
    }

    /**
     * Set the value of gender
     *
     * @param ?StringClass $gender
     *
     * @return self
     */
    public function setGender(?StringClass $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get the value of species
     *
     * @return ?StringClass
     */
    public function getSpecies(): ?StringClass
    {
        return $this->species;
    }

    /**
     * Set the value of species
     *
     * @param ?StringClass $species
     *
     * @return self
     */
    public function setSpecies(?StringClass $species): self
    {
        $this->species = $species;

        return $this;
    }

    /**
     * Get the value of secretIdentity

     *
     * @return ?StringClass
     */
    public function getSecretIdentity(): ?StringClass
    {
        return $this->secretIdentity;
    }

    /**
     * Set the value of secretIdentity
     *
     * @param ?StringClass $secretIdentity
     *
     * @return self
     */
    public function setSecretIdentity(StringClass $secretIdentity): self
    {
        $this->secretIdentity = $secretIdentity;

        return $this;
    }

    /**
     * Get the value of aliases
     *
     * @return ?ArrayClass
     */
    public function getAliases(): ?ArrayClass
    {
        return $this->aliases;
    }

    /**
     * Set the value of aliases
     *
     * @param ?ArrayClass $aliases
     *
     * @return self
     */
    public function setAliases(?ArrayClass $aliases): self
    {
        $this->aliases = $aliases;

        return $this;
    }

    /**
     * Get the value of superPowers
     *
     * @return ?ArrayClass
     */
    public function getSuperPowers(): ?ArrayClass
    {
        return $this->superPowers;
    }

    /**
     * Set the value of superPowers
     *
     * @param ?ArrayClass $superPowers
     *
     * @return self
     */
    public function setSuperPowers(?ArrayClass $superPowers): self
    {
        $this->superPowers = $superPowers;

        return $this;
    }

    /**
     * Get the value of powers
     *
     * @return ?ArrayClass
     */
    public function getPowers(): ?ArrayClass
    {
        return $this->powers;
    }

    /**
     * Set the value of powers
     *
     * @param ?ArrayClass $powers
     *
     * @return self
     */
    public function setPowers(?ArrayClass $powers): self
    {
        $this->powers = $powers;

        return $this;
    }

    /**
     * Get the value of famousWords
     *
     * @return ?ArrayClass
     */
    public function getFamousWords(): ?ArrayClass
    {
        return $this->famousWords;
    }

    /**
     * Set the value of famousWords
     *
     * @param ?ArrayClass $famousWords
     *
     * @return self
     */
    public function setFamousWords(?ArrayClass $famousWords): self
    {
        $this->famousWords = $famousWords;

        return $this;
    }

    /**
     * Get the value of famousLastWords
     *
     * @return ?StringClass
     */
    public function getFamousLastWords(): ?StringClass
    {
        return $this->famousLastWords;
    }

    /**
     * Set the value of famousLastWords
     *
     * @param ?StringClass $famousLastWords
     *
     * @return self
     */
    public function setFamousLastWords(?StringClass $famousLastWords): self
    {
        $this->famousLastWords = $famousLastWords;

        return $this;
    }

    /**
     * Get the value of status
     *
     * @return ?StringClass
     */
    public function getStatus(): ?StringClass
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @param ?StringClass $status
     *
     * @return self
     */
    public function setStatus(?StringClass $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of origin
     *
     * @return ?ArrayClass
     */
    public function getOrigin(): ?ArrayClass
    {
        return $this->origin;
    }

    /**
     * Set the value of origin
     *
     * @param ?ArrayClass $origin
     *
     * @return self
     */
    public function setOrigin(?ArrayClass $origin): self
    {
        $this->origin = $origin;

        return $this;
    }

    /**
     * Get the value of title
     *
     * @return ?StringClass
     */
    public function getTitle(): ?StringClass
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @param ?StringClass $title
     *
     * @return self
     */
    public function setTitle(?StringClass $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of title
     *
     * @return ?StringClass
     */
    public function getEducation(): ?StringClass
    {
        return $this->education;
    }

    /**
     * Set the value of title
     *
     * @param ?StringClass $title
     *
     * @return self
     */
    public function setEducation(?StringClass $education): self
    {
        $this->education = $education;

        return $this;
    }

     /**
     * Get the value of title
     *
     * @return ?StringClass
     */
    public function getFranchise(): ?StringClass
    {
        return $this->franchise;
    }

    /**
     * Set the value of title
     *
     * @param ?StringClass $title
     *
     * @return self
     */
    public function setFranchise(?StringClass $franchise): self
    {
        $this->franchise = $franchise;

        return $this;
    }
}
