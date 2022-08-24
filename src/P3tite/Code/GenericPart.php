<?php

declare(strict_types=1);
/**
 * Class for generic (language independant) source code generation
 *  
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P3tite
 * @package P3tite
 * @version 0.1
 * @since 2022-08-12
 */

namespace P3tite\Code;

use P3tite\Type\StringClass;

class GenericPart extends StringClass
{
    
    /**
     * Constants defining different embracing styles:
     * ( AND ) ARE THE LEFT AND RIGHT PARENTHESES, SINGULAR PARENTHESIS.
     * [ AND ] ARE THE LEFT AND RIGHT SQUARE BRACKETS.
     * { AND } ARE THE LEFT AND RIGHT CURLY BRACES.
     * < AND > LEFT AND RIGHT ANGLE BRACKETS.
     */

    public const BRACE_STYLE_PARENTHESES = 1;
    public const BRACE_STYLE_SQUARE_BRACKETS = 2;
    public const BRACE_STYLE_CURLY_BRACES = 4;
    public const BRACE_STYLE_ANGLE_BRACKETS = 8;


    /**
     * Constants for brace|bracket symbols
     */
    public const LEFT_PARENTHESIS = '(';
    public const RIGHT_PARENTHESIS = ')';

    public const LEFT_SQUARE_BRACKET = '[';
    public const RIGHT_SQUARE_BRACKET = ']';

    public const LEFT_CURLY_BRACE = '{';
    public const RIGHT_CURLY_BRACE = '}';

    public const LEFT_ANGLE_BRACKET = '<';
    public const RIGHT_ANGLE_BRACKET = '>';


    public function embrace(int $style = self::BRACE_STYLE_PARENTHESES): self
    {
        switch ($style) {

            case self::BRACE_STYLE_CURLY_BRACES:
                $start = self::LEFT_CURLY_BRACE;
                $end = self::RIGHT_CURLY_BRACE;
                break;

            case self::BRACE_STYLE_SQUARE_BRACKETS:
                $start = self::LEFT_SQUARE_BRACKET;
                $end = self::RIGHT_SQUARE_BRACKET;
                break;

            case self::BRACE_STYLE_ANGLE_BRACKETS:
                $start = self::LEFT_ANGLE_BRACKET;
                $end = self::RIGHT_ANGLE_BRACKET;
                break;

            case self::BRACE_STYLE_PARENTHESES:
            default:
                $start = self::LEFT_PARENTHESIS;
                $end = self::RIGHT_PARENTHESIS;
                break;
        }
                
        $this->prepend($start)->append($end);
        return $this;
    }
}
