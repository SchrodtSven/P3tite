<?php

declare(strict_types=1);
/**
 * Unit testing Foo 
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P3tite
 * @package P3tite
 * @version 0.1
 * @since 2022-08-11
 */

use P3tite\Code\GenericPart;
use P3tite\Type\ArrayClass;
use P3tite\Type\StringClass;

use PHPUnit\Framework\TestCase;
use P3tite\Code\Mocking\RandomData;
use P3tite\Entity\Hero;


class MockTest extends TestCase
{



    public function testJsonParing()
    {
        $all = new ArrayClass();
        $marvel = new ArrayClass();

        $data = new ArrayClass(file('src/P3tite/Code/Mocking/raw_data/heroes_marvel.txt'));
        //$ppreParsed = $data->splitB
        $franchise = 'Marvel';
        $newFile = 'src/P3tite/Code/Mocking/serialized_data/marvel.ser';
        foreach ($data as $item) {

            $raw = (new StringClass($item))
                ->splitBy("\t");
            $hero = new Hero($raw->get(0));
            $hero->setFranchise(new StringClass($franchise));
            /*   var_dump($hero->getFirstName());
            var_dump($hero->getLastName());
            var_dump($hero->getMidNames()); */
            //echo (new StringClass())
            $identities = (new StringClass($raw[1]))->splitBy(', ');
            // var_dump($identities);
            $hero->setSecretIdentity(new StringClass($identities->shift()));
            $hero->setAliases($identities);
            $marvel->push($hero);
        }

        $all->setByKey($franchise, $marvel);
        file_put_contents($newFile, serialize($marvel));
        $this->assertTrue(2 == 1 + 1);
    }
}
