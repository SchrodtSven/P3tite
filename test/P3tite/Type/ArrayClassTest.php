<?php

declare(strict_types=1);
/**
 * Unit testing Foo 
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P3tite
 * @package P3tite
 * @version 0.1
 */

use P3tite\Type\StringClass;
use P3tite\Type\ArrayClass;
use PHPUnit\Framework\TestCase;

class ArrayClassTest extends TestCase
{
    public function testBasix(): void
    {
        $foo = new ArrayClass($this->wordProvider());

        $this->assertInstanceOf('P3tite\Type\ArrayClass', $foo);
        $this->assertTrue(is_int(count($foo)));
        $this->assertTrue(count($foo) === count($this->wordProvider()));
        $this->assertTrue(is_iterable($foo));
    }

    public function testBasicOperations(): void
    {
        $foo = new ArrayClass(['Peter Parker']);
        $foo->push('Tony Stark');

        $this->assertTrue(count($foo)===2);
        $this->assertTrue($foo->get(0) === 'Peter Parker');
        $this->assertTrue($foo->get(1) === 'Tony Stark');
        $this->assertTrue(is_iterable($foo));
    }


    public function testUniquing(): void
    {
        $foo = new ArrayClass(
            [
                'Alpha',
                'Beta',
                'Beta',
                'Omicron Basic',
                'Turbo Pascal',
                'Beta'
            ]
        );
        $foo->removeDuplicates();
        $this->assertTrue(count($foo) === 4);
        $this->assertTrue($foo->get(0) === 'Alpha');
        $this->assertTrue($foo->get(1) === 'Beta');
        $this->assertTrue($foo->get(3) === 'Omicron Basic');
        $this->assertTrue($foo->get(4) === 'Turbo Pascal');
    }

    // Fake data provider 
    public function wordProvider(): array
    {
        return [
            'illo', 'modi', 'Quis', 'velit,', 'quisquam', 'Nemo', 'adipisci', 'quam', 'voluptatem', 'ullam', 'ea', 'quo', 'vitae', 'Sed',
            'totam', 'sit', 'ipsum', 'Neque', 'nesciunt.', 'veniam,', 'aut', 'laboriosam,', 'esse', 'exercitationem', 'sed', 'architecto',
            'quia', 'amet,', 'minima', 'et', 'dolorem', 'dolore', 'sequi', 'sit', 'ut', 'eaque', 'ipsam', 'Ut', 'beatae', 'fugit,', 'quia',
            'quia', 'enim', 'ratione', 'veritatis', 'explicabo.', 'commodi', 'quaerat', 'aliquid', 'dolorem', 'nihil', 'ex', 'consequuntur',
            'voluptatem', 'molestiae', 'et', 'sed', 'fugiat', 'consectetur,', 'voluptas', 'in', 'iste', 'voluptas', 'qui', 'eum', 'ab', 'quis',
            'sunt', 'autem', 'iure', 'tempora', 'dicta', 'pariatur?', 'quasi', 'consequatur?', 'odit', 'ea', 'eius', 'natus', 'dolores', 'vel',
            'porro', 'quia', 'voluptatem.', 'enim', 'qui', 'eum', 'accusantium', 'quae', 'laudantium,', 'velit', 'sit', 'numquam', 'perspiciatis',
            'unde', 'labore', 'aspernatur', 'qui', 'voluptatem', 'omnis', 'ipsa', 'consequatur,', 'doloremque', 'eos', 'qui', 'incidunt',
            'reprehenderit', 'nisi', 'nostrum', 'nulla', 'rem', 'magnam', 'ut', 'voluptate', 'illum', 'aut', 'ad', 'aliquam', 'corporis', 'vel',
            'non', 'aperiam,', 'dolor', 'inventore', 'error', 'ut', 'est,', 'suscipit', 'magni'
        ];
    }
}
