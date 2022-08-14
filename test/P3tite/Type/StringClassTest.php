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
    public function testBasix(): void
    {

        $start = '[';
        $end = ']';
        $bar = '-Lorem_ipsum';
        $foo = new StringClass($bar);
        $this->assertInstanceOf('P3tite\Type\StringClass', $foo);
        foreach ($this->wordProvider() as $item) {
            $foo = new StringClass($item);
            $this->assertSame((string) $foo->concat($bar), $item . $bar);
            $foo = new StringClass($item);
            $this->assertSame((string) $foo->prepend($start), $start . $item);
            $foo = new StringClass($item);
            $this->assertSame((string) $foo->append($end), $item . $end);
            $foo = new StringClass($item);
            $this->assertSame((string) $foo->append($end)->prepend($start), $start . $item . $end);

            $foo = new StringClass($item);
            $foo->prepend($this->getRandomTrimCharacter())->append($this->getRandomTrimCharacter());
            $this->assertSame($item, (string) $foo->trim());

            $foo = new StringClass($item);
            $foo->save();
            $foo->toUpper();
            $this->assertFalse((string) $foo === $item);
            $this->assertSame($item, (string) $foo->getSaved());
            $this->assertSame($item, $foo->rollback()->getContent());
        }
    }


    /**
     * @todo -> use dataProvider and change signature (string $a, string $b)
     */
    public function testRollback(): void
    {
        $a = 'Dr. Henry Pym ';
        $b = 'was Yellowjacket';
        $foo = new StringClass($a);
        $foo->save();
        $foo->concat($b);
        $this->assertSame((string) $foo, $a . $b);
        $foo->rollback();
        $this->assertSame((string) $foo, $a);

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

    public function getRandomTrimCharacter(): string
    {
        $to2Trimmed = [' ', "\n", "\r", "\t", "\v", "\x00"];
        return $to2Trimmed[array_rand($to2Trimmed)];
    }

    /**
     * @dataProvider upperCasedWordProvider
     */
    public function testUppercase(string $input, string $uppercased)
    {
        $foo = new StringClass($input);
        $this->assertSame( (string) $foo->toUpper(), $uppercased);
    }

    /**
     * @dataProvider upperCasedWordProvider
     */
    public function testLowercase(string $input, string $uppercased)
    {
        $foo = new StringClass($uppercased);
        $this->assertSame( (string) $foo->toLower(), mb_strtolower($input));
    }

    /**
     * @dataProvider upperCasedWordProvider
     */
    public function testLowerFirst(string $input, string $uppercased)
    {
        $foo = new StringClass($uppercased);
        $this->assertSame( (string) $foo->toLower()->lowerFirst(), lcfirst(mb_strtolower($input)));
    }

    /**
     * @dataProvider upperCasedWordProvider
     */
    public function testUpperFirst(string $input, string $uppercased)
    {
        $foo = new StringClass($uppercased);
        $this->assertSame( (string) $foo->toLower()->upperFirst(), ucfirst(mb_strtolower($input)));
    }

    public function upperCasedWordProvider()
    {
        return [
            ['illo', 'ILLO'],
            ['modi', 'MODI'],
            ['Quis', 'QUIS'],
            ['velit,', 'VELIT,'],
            ['quisquam', 'QUISQUAM'],
            ['Nemo', 'NEMO'],
            ['adipisci', 'ADIPISCI'],
            ['quam', 'QUAM'],
            ['voluptatem', 'VOLUPTATEM'],
            ['ullam', 'ULLAM'],
            ['ea', 'EA'],
            ['quo', 'QUO'],
            ['vitae', 'VITAE'],
            ['Sed', 'SED'],
            ['totam', 'TOTAM'],
            ['sit', 'SIT'],
            ['ipsum', 'IPSUM'],
            ['Neque', 'NEQUE'],
            ['nesciunt.', 'NESCIUNT.'],
            ['veniam,', 'VENIAM,'],
            ['aut', 'AUT'],
            ['laboriosam,', 'LABORIOSAM,'],
            ['esse', 'ESSE'],
            ['exercitationem', 'EXERCITATIONEM'],
            ['sed', 'SED'],
            ['architecto', 'ARCHITECTO'],
            ['quia', 'QUIA'],
            ['amet,', 'AMET,'],
            ['minima', 'MINIMA'],
            ['et', 'ET'],
            ['dolorem', 'DOLOREM'],
            ['dolore', 'DOLORE'],
            ['sequi', 'SEQUI'],
            ['sit', 'SIT'],
            ['ut', 'UT'],
            ['eaque', 'EAQUE'],
            ['ipsam', 'IPSAM'],
            ['Ut', 'UT'],
            ['beatae', 'BEATAE'],
            ['fugit,', 'FUGIT,'],
            ['quia', 'QUIA'],
            ['quia', 'QUIA'],
            ['enim', 'ENIM'],
            ['ratione', 'RATIONE'],
            ['veritatis', 'VERITATIS'],
            ['explicabo.', 'EXPLICABO.'],
            ['commodi', 'COMMODI'],
            ['quaerat', 'QUAERAT'],
            ['aliquid', 'ALIQUID'],
            ['dolorem', 'DOLOREM'],
            ['nihil', 'NIHIL'],
            ['ex', 'EX'],
            ['consequuntur', 'CONSEQUUNTUR'],
            ['voluptatem', 'VOLUPTATEM'],
            ['molestiae', 'MOLESTIAE'],
            ['et', 'ET'],
            ['sed', 'SED'],
            ['fugiat', 'FUGIAT'],
            ['consectetur,', 'CONSECTETUR,'],
            ['voluptas', 'VOLUPTAS'],
            ['in', 'IN'],
            ['iste', 'ISTE'],
            ['voluptas', 'VOLUPTAS'],
            ['qui', 'QUI'],
            ['eum', 'EUM'],
            ['ab', 'AB'],
            ['quis', 'QUIS'],
            ['sunt', 'SUNT'],
            ['autem', 'AUTEM'],
            ['iure', 'IURE'],
            ['tempora', 'TEMPORA'],
            ['dicta', 'DICTA'],
            ['pariatur?', 'PARIATUR?'],
            ['quasi', 'QUASI'],
            ['consequatur?', 'CONSEQUATUR?'],
            ['odit', 'ODIT'],
            ['ea', 'EA'],
            ['eius', 'EIUS'],
            ['natus', 'NATUS'],
            ['dolores', 'DOLORES'],
            ['vel', 'VEL'],
            ['porro', 'PORRO'],
            ['quia', 'QUIA'],
            ['voluptatem.', 'VOLUPTATEM.'],
            ['enim', 'ENIM'],
            ['qui', 'QUI'],
            ['eum', 'EUM'],
            ['accusantium', 'ACCUSANTIUM'],
            ['quae', 'QUAE'],
            ['laudantium,', 'LAUDANTIUM,'],
            ['velit', 'VELIT'],
            ['sit', 'SIT'],
            ['numquam', 'NUMQUAM'],
            ['perspiciatis', 'PERSPICIATIS'],
            ['unde', 'UNDE'],
            ['labore', 'LABORE'],
            ['aspernatur', 'ASPERNATUR'],
            ['qui', 'QUI'],
            ['voluptatem', 'VOLUPTATEM'],
            ['omnis', 'OMNIS'],
            ['ipsa', 'IPSA'],
            ['consequatur,', 'CONSEQUATUR,'],
            ['doloremque', 'DOLOREMQUE'],
            ['eos', 'EOS'],
            ['qui', 'QUI'],
            ['incidunt', 'INCIDUNT'],
            ['reprehenderit', 'REPREHENDERIT'],
            ['nisi', 'NISI'],
            ['nostrum', 'NOSTRUM'],
            ['nulla', 'NULLA'],
            ['rem', 'REM'],
            ['magnam', 'MAGNAM'],
            ['ut', 'UT'],
            ['voluptate', 'VOLUPTATE'],
            ['illum', 'ILLUM'],
            ['aut', 'AUT'],
            ['ad', 'AD'],
            ['aliquam', 'ALIQUAM'],
            ['corporis', 'CORPORIS'],
            ['vel', 'VEL'],
            ['non', 'NON'],
            ['aperiam,', 'APERIAM,'],
            ['dolor', 'DOLOR'],
            ['inventore', 'INVENTORE'],
            ['error', 'ERROR'],
            ['ut', 'UT'],
            ['est,', 'EST,'],
            ['suscipit', 'SUSCIPIT'],
            ['magni', 'MAGNI']
        ];
    }
}
