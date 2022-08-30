<?php

declare(strict_types=1);
/**
 * Project specific foundation class for unit tests  
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P3tite
 * @package P3tite
 * @version 0.1
 * @since 2022-08-25
 */
namespace P3tite\Core\Testing;

use P3tite\Entity\BasicEntity;
use P3tite\Type\StringClass;
use P3tite\Type\ArrayClass;
use PHPUnit\Framework\TestCase;
use \DateTime;

class UnitTest extends TestCase
{
    protected int $minId = 1;

    protected int $maxId = \PHP_INT_MAX ;

    protected int $maximumRandomGeneratorRuns = 500;


    /**
    public function genericDataProvider(UnitTestConfig $config)
    {
        // doStuff();
        // yield [$a, $b ... $n];
    }

    public function generateStaticDataProviderFromConfig(UnitTestConfig $config, string $targetType = 'file', string $target)
    {
        // doStuff();
        // yield [$a, $b ... $n];
    }
     */


    /**
     * Get the value of minId
     *
     * @return int
     */
    public function getMinId(): int
    {
        return $this->minId;
    }

    /**
     * Set the value of minId
     *
     * @param int $minId
     *
     * @return self
     */
    public function setMinId(int $minId): self
    {
        $this->minId = $minId;

        return $this;
    }

    /**
     * Get the value of maxId
     *
     * @return int
     */
    public function getMaxId(): int
    {
        return $this->maxId;
    }

    /**
     * Set the value of maxId
     *
     * @param int $maxId
     *
     * @return self
     */
    public function setMaxId(int $maxId): self
    {
        $this->maxId = $maxId;

        return $this;
    }

    /**
     * Get the value of maximumRandomGeneratorRuns
     *
     * @return int
     */
    public function getMaximumRandomGeneratorRuns(): int
    {
        return $this->maximumRandomGeneratorRuns;
    }

    /**
     * Set the value of maximumRandomGeneratorRuns
     *
     * @param int $maximumRandomGeneratorRuns
     * @FIXME - boundary check -> >=1
     * @return self
     */
    public function setMaximumRandomGeneratorRuns(int $maximumRandomGeneratorRuns): self
    {
        $this->maximumRandomGeneratorRuns = $maximumRandomGeneratorRuns;

        return $this;
    }
}