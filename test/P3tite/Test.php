<?php

declare(strict_types=1);
/**
 * Testing, if PHPUnit tests will work
 *
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P3tite
 * @package P3tite
 * @version 0.1
 * @since 2022-08-15
 */



use PHPUnit\Framework\TestCase;


class Test extends TestCase
{


    /**
     * @dataProvider getSummandsAndCheck
     *
     * @param int $a
     * @param int $b
     * @param int $c
     * @return void
     */
    public function testAddition(int $a, int $b, int $c): void
    {
        $this->assertTrue($a + $b === $c);
    }

    /**
     * @return int[][]
     */
    public function getSummandsAndCheck(): array
    {
        return [
            [211, 969, 1180],
            [276, 147, 423],
            [974, 45, 1019],
            [377, 235, 612],
            [590, 291, 881],
            [434, 414, 848],
            [310, 909, 1219],
            [921, 989, 1910],
            [597, 83, 680],
            [821, 860, 1681],
            [37, 498, 535],
            [370, 346, 716],
            [25, 292, 317],
            [961, 457, 1418],
            [577, 809, 1386],
            [653, 535, 1188],
            [632, 923, 1555],
            [268, 173, 441],
            [855, 275, 1130],
            [857, 218, 1075],
            [287, 350, 637],
            [98, 82, 180],
            [882, 217, 1099],
            [449, 629, 1078],
            [377, 906, 1283],
            [583, 252, 835],
            [939, 338, 1277],
            [818, 502, 1320],
            [183, 907, 1090],
            [945, 816, 1761],
            [468, 971, 1439],
            [866, 391, 1257],
            [773, 573, 1346],
            [63, 361, 424],
            [672, 173, 845],
            [410, 622, 1032],
            [700, 963, 1663],
            [152, 847, 999],
            [102, 43, 145],
            [271, 77, 348],
            [592, 487, 1079],
            [544, 680, 1224],
            [990, 860, 1850],
            [426, 847, 1273],
            [26, 343, 369],
            [40, 480, 520],
            [923, 617, 1540],
            [513, 949, 1462],
            [385, 955, 1340],
            [524, 612, 1136],
            [77, 96, 173],
            [376, 264, 640],
            [337, 731, 1068],
            [104, 219, 323],
            [340, 339, 679],
            [651, 511, 1162],
            [220, 979, 1199],
            [337, 918, 1255],
            [560, 611, 1171],
            [679, 305, 984],
            [736, 407, 1143],
            [756, 349, 1105],
            [92, 882, 974],
            [211, 142, 353],
            [136, 537, 673],
            [321, 606, 927],
            [751, 59, 810],
            [452, 180, 632],
            [645, 342, 987],
            [420, 421, 841],
            [313, 391, 704],
            [561, 168, 729],
            [188, 252, 440],
            [102, 522, 624],
            [891, 178, 1069],
            [245, 3, 248],
            [49, 106, 155],
            [495, 263, 758],
            [252, 881, 1133],
            [487, 285, 772],
            [144, 475, 619],
            [82, 339, 421],
            [88, 101, 189],
            [818, 567, 1385],
            [152, 159, 311],
            [851, 144, 995],
            [498, 45, 543],
            [868, 864, 1732],
            [209, 914, 1123],
            [840, 537, 1377],
            [940, 639, 1579],
            [144, 840, 984],
            [363, 592, 955],
            [544, 909, 1453],
            [575, 157, 732],
            [351, 473, 824],
            [631, 763, 1394],
            [372, 247, 619],
            [477, 596, 1073],
            [960, 675, 1635]
        ];
    }
}
