<?php

declare(strict_types=1);
/**
 * Unit testing BasicEntity
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P3tite
 * @package P3tite
 * @version 0.1
 * @since 2022-08-12
 */

use P3tite\Entity\BasicEntity;
use P3tite\Type\StringClass;
use P3tite\Type\ArrayClass;
use P3tite\Core\Testing\UnitTest;
 
 

class BasicEntityTest extends UnitTest
{
    private BasicEntity $entity;



    private int $notPersistedId = 0;

    /*public function setUp(): void
    {
        $this->entity = new class() extends BasicEntity
        {
            
        };
    }
   
    */

   /*

    public function setUp(): void
    {
        $now = new DateTime();
        $this->entity = new BasicEntity(rand(1,65535), $now, $now));
    }
*/

    /**
     * @dataProvider randomConstructorSignatureProvider
     */
    public function testBasix(int $id, DateTime $created, DateTime $modified): void
    {
            $entity = $this->getAnonymousBasicEntityChild($id, $created, $modified);
            $this->assertTrue(is_int($entity->getId()));
         //  var_dump($this->entity);die;
            
    }

    /**
     * @FIXME - generate random $created ++ random $modified >= $created
     */
    public function randomConstructorSignatureProvider(): \Generator
    {
        
        for($i=0;$i < $this->maximumRandomGeneratorRuns; $i++)
        {
            $now = new DateTime();
            yield [rand($this->minId, $this->maxId), $now, $now];
        }
    }

    private function getAnonymousBasicEntityChild(int $id = 0, ?\DateTime $created = null, ?\DateTime $modified = null)
    {
        return  new class($id, $created, $modified) extends BasicEntity
        {
            
        };
    }
}