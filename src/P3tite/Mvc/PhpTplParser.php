<?php

declare(strict_types=1);
/**
 * Managing templates in PHP (alternative) syntax 
 * 
 * @see https://www.php.net/manual/de/control-structures.alternative-syntax.php
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P3tite
 * @package P3tite
 * @version 0.1
 * @since 2022-08-11
 */

namespace P3tite\Mvc;

use P3tite\Type\StringClass;
use P3tite\Type\ArrayClass;

class TplParser
{

    private string $content = 'Foo!';


    public function __construct()
    {

    }


    /**
     * @return string
     */
    public function getContent(): string 
    {
        return $this->content;
    }

    /**
     * @param string$content
     * @return self
     */
    public function setContent(string $content): self
    {
        $this->content = $content;
        return $this;
    }

    public function renderTemplate(string $path2Tpl)
    {
        ob_start();
        require_once $path2Tpl;
        $content =  ob_get_contents();
        ob_end_clean();
        return $content;
    }

 

}