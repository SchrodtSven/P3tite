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
use PHPUnit\Framework\TestCase;

class StringClassTest extends TestCase
{

    private const POPE = 666;


    public function testBasix(): void
    {

        $start = '[';
        $end = ']';
        $bar = '-Lorem_ipsum';

        foreach ($this->wordProvider() as $item) {
            $foo = new StringClass($item);
            $this->assertSame((string) $foo->concat($bar), $item . $bar);
            $foo = new StringClass($item);
            $this->assertSame((string) $foo->prepend($start), $start . $item);
            $foo = new StringClass($item);
            $this->assertSame((string) $foo->append($end), $item . $end);
            $foo = new StringClass($item);
            $this->assertSame((string) $foo->append($end)->prepend($start), $start . $item . $end);
        }
    }


    public function testCasting(): void
    {
        foreach ($this->wordProvider() as $item) {
            $foo = new StringClass($item);
            $this->assertSame((string) $foo->toLower(), strtolower($item));
            $foo = new StringClass($item);
            $this->assertSame((string) $foo->toUpper(), strtoupper($item));
            $foo = new StringClass($item);
            $this->assertSame((string) $foo->lowerFirst(), lcfirst($item));
            $foo = new StringClass($item);
            $this->assertSame((string) $foo->upperFirst(), ucfirst($item));
        }
    }

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
