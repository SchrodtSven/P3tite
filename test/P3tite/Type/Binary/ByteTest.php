<?php

declare(strict_types=1);
/**
 * Testing Crumb class
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P3tite
 * @package P3tite
 * @version 0.1
 * @since 2022-08-14
 */

use PHPUnit\Framework\TestCase;
use P3tite\Type\Binary\Byte;

class ByteTest extends TestCase
{
    /**
     * @dataProvider valueAndLiteralProvider
     */
    public function testBasix(int $input, int $expected, string $binaryLiteral)
    {
        $bar = new Byte($input);
        $this->assertTrue($bar->getCurrentValue() === $expected);
        $this->assertTrue($bar->getMaxValue() === 255);
        $this->assertTrue($bar->getMinValue() === 0);
        $this->assertTrue((string) $bar === $binaryLiteral);
    }

    public function valueAndLiteralProvider()
    {
        return [
            [0, 0, '00000000'],
            [1, 1, '00000001'],
            [2, 2, '00000010'],
            [3, 3, '00000011'],
            [4, 4, '00000100'],
            [5, 5, '00000101'],
            [6, 6, '00000110'],
            [7, 7, '00000111'],
            [8, 8, '00001000'],
            [9, 9, '00001001'],
            [10, 10, '00001010'],
            [11, 11, '00001011'],
            [12, 12, '00001100'],
            [13, 13, '00001101'],
            [14, 14, '00001110'],
            [15, 15, '00001111'],
            [16, 16, '00010000'],
            [17, 17, '00010001'],
            [18, 18, '00010010'],
            [19, 19, '00010011'],
            [20, 20, '00010100'],
            [21, 21, '00010101'],
            [22, 22, '00010110'],
            [23, 23, '00010111'],
            [24, 24, '00011000'],
            [25, 25, '00011001'],
            [26, 26, '00011010'],
            [27, 27, '00011011'],
            [28, 28, '00011100'],
            [29, 29, '00011101'],
            [30, 30, '00011110'],
            [31, 31, '00011111'],
            [32, 32, '00100000'],
            [33, 33, '00100001'],
            [34, 34, '00100010'],
            [35, 35, '00100011'],
            [36, 36, '00100100'],
            [37, 37, '00100101'],
            [38, 38, '00100110'],
            [39, 39, '00100111'],
            [40, 40, '00101000'],
            [41, 41, '00101001'],
            [42, 42, '00101010'],
            [43, 43, '00101011'],
            [44, 44, '00101100'],
            [45, 45, '00101101'],
            [46, 46, '00101110'],
            [47, 47, '00101111'],
            [48, 48, '00110000'],
            [49, 49, '00110001'],
            [50, 50, '00110010'],
            [51, 51, '00110011'],
            [52, 52, '00110100'],
            [53, 53, '00110101'],
            [54, 54, '00110110'],
            [55, 55, '00110111'],
            [56, 56, '00111000'],
            [57, 57, '00111001'],
            [58, 58, '00111010'],
            [59, 59, '00111011'],
            [60, 60, '00111100'],
            [61, 61, '00111101'],
            [62, 62, '00111110'],
            [63, 63, '00111111'],
            [64, 64, '01000000'],
            [65, 65, '01000001'],
            [66, 66, '01000010'],
            [67, 67, '01000011'],
            [68, 68, '01000100'],
            [69, 69, '01000101'],
            [70, 70, '01000110'],
            [71, 71, '01000111'],
            [72, 72, '01001000'],
            [73, 73, '01001001'],
            [74, 74, '01001010'],
            [75, 75, '01001011'],
            [76, 76, '01001100'],
            [77, 77, '01001101'],
            [78, 78, '01001110'],
            [79, 79, '01001111'],
            [80, 80, '01010000'],
            [81, 81, '01010001'],
            [82, 82, '01010010'],
            [83, 83, '01010011'],
            [84, 84, '01010100'],
            [85, 85, '01010101'],
            [86, 86, '01010110'],
            [87, 87, '01010111'],
            [88, 88, '01011000'],
            [89, 89, '01011001'],
            [90, 90, '01011010'],
            [91, 91, '01011011'],
            [92, 92, '01011100'],
            [93, 93, '01011101'],
            [94, 94, '01011110'],
            [95, 95, '01011111'],
            [96, 96, '01100000'],
            [97, 97, '01100001'],
            [98, 98, '01100010'],
            [99, 99, '01100011'],
            [100, 100, '01100100'],
            [101, 101, '01100101'],
            [102, 102, '01100110'],
            [103, 103, '01100111'],
            [104, 104, '01101000'],
            [105, 105, '01101001'],
            [106, 106, '01101010'],
            [107, 107, '01101011'],
            [108, 108, '01101100'],
            [109, 109, '01101101'],
            [110, 110, '01101110'],
            [111, 111, '01101111'],
            [112, 112, '01110000'],
            [113, 113, '01110001'],
            [114, 114, '01110010'],
            [115, 115, '01110011'],
            [116, 116, '01110100'],
            [117, 117, '01110101'],
            [118, 118, '01110110'],
            [119, 119, '01110111'],
            [120, 120, '01111000'],
            [121, 121, '01111001'],
            [122, 122, '01111010'],
            [123, 123, '01111011'],
            [124, 124, '01111100'],
            [125, 125, '01111101'],
            [126, 126, '01111110'],
            [127, 127, '01111111'],
            [128, 128, '10000000'],
            [129, 129, '10000001'],
            [130, 130, '10000010'],
            [131, 131, '10000011'],
            [132, 132, '10000100'],
            [133, 133, '10000101'],
            [134, 134, '10000110'],
            [135, 135, '10000111'],
            [136, 136, '10001000'],
            [137, 137, '10001001'],
            [138, 138, '10001010'],
            [139, 139, '10001011'],
            [140, 140, '10001100'],
            [141, 141, '10001101'],
            [142, 142, '10001110'],
            [143, 143, '10001111'],
            [144, 144, '10010000'],
            [145, 145, '10010001'],
            [146, 146, '10010010'],
            [147, 147, '10010011'],
            [148, 148, '10010100'],
            [149, 149, '10010101'],
            [150, 150, '10010110'],
            [151, 151, '10010111'],
            [152, 152, '10011000'],
            [153, 153, '10011001'],
            [154, 154, '10011010'],
            [155, 155, '10011011'],
            [156, 156, '10011100'],
            [157, 157, '10011101'],
            [158, 158, '10011110'],
            [159, 159, '10011111'],
            [160, 160, '10100000'],
            [161, 161, '10100001'],
            [162, 162, '10100010'],
            [163, 163, '10100011'],
            [164, 164, '10100100'],
            [165, 165, '10100101'],
            [166, 166, '10100110'],
            [167, 167, '10100111'],
            [168, 168, '10101000'],
            [169, 169, '10101001'],
            [170, 170, '10101010'],
            [171, 171, '10101011'],
            [172, 172, '10101100'],
            [173, 173, '10101101'],
            [174, 174, '10101110'],
            [175, 175, '10101111'],
            [176, 176, '10110000'],
            [177, 177, '10110001'],
            [178, 178, '10110010'],
            [179, 179, '10110011'],
            [180, 180, '10110100'],
            [181, 181, '10110101'],
            [182, 182, '10110110'],
            [183, 183, '10110111'],
            [184, 184, '10111000'],
            [185, 185, '10111001'],
            [186, 186, '10111010'],
            [187, 187, '10111011'],
            [188, 188, '10111100'],
            [189, 189, '10111101'],
            [190, 190, '10111110'],
            [191, 191, '10111111'],
            [192, 192, '11000000'],
            [193, 193, '11000001'],
            [194, 194, '11000010'],
            [195, 195, '11000011'],
            [196, 196, '11000100'],
            [197, 197, '11000101'],
            [198, 198, '11000110'],
            [199, 199, '11000111'],
            [200, 200, '11001000'],
            [201, 201, '11001001'],
            [202, 202, '11001010'],
            [203, 203, '11001011'],
            [204, 204, '11001100'],
            [205, 205, '11001101'],
            [206, 206, '11001110'],
            [207, 207, '11001111'],
            [208, 208, '11010000'],
            [209, 209, '11010001'],
            [210, 210, '11010010'],
            [211, 211, '11010011'],
            [212, 212, '11010100'],
            [213, 213, '11010101'],
            [214, 214, '11010110'],
            [215, 215, '11010111'],
            [216, 216, '11011000'],
            [217, 217, '11011001'],
            [218, 218, '11011010'],
            [219, 219, '11011011'],
            [220, 220, '11011100'],
            [221, 221, '11011101'],
            [222, 222, '11011110'],
            [223, 223, '11011111'],
            [224, 224, '11100000'],
            [225, 225, '11100001'],
            [226, 226, '11100010'],
            [227, 227, '11100011'],
            [228, 228, '11100100'],
            [229, 229, '11100101'],
            [230, 230, '11100110'],
            [231, 231, '11100111'],
            [232, 232, '11101000'],
            [233, 233, '11101001'],
            [234, 234, '11101010'],
            [235, 235, '11101011'],
            [236, 236, '11101100'],
            [237, 237, '11101101'],
            [238, 238, '11101110'],
            [239, 239, '11101111'],
            [240, 240, '11110000'],
            [241, 241, '11110001'],
            [242, 242, '11110010'],
            [243, 243, '11110011'],
            [244, 244, '11110100'],
            [245, 245, '11110101'],
            [246, 246, '11110110'],
            [247, 247, '11110111'],
            [248, 248, '11111000'],
            [249, 249, '11111001'],
            [250, 250, '11111010'],
            [251, 251, '11111011'],
            [252, 252, '11111100'],
            [253, 253, '11111101'],
            [254, 254, '11111110'],
            [255, 255, '11111111']
        ];
    }
}