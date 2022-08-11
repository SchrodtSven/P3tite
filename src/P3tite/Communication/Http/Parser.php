<?php

declare(strict_types=1);
/**
 * Class for parsing http elements (messages, uris ...)
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P3tite
 * @package P3tite
 * @version 0.1
 * @since 2022-08-11
 * 
 */

namespace P3tite\Communication\Http;

use P3tite\Type\ArrayClass;


class Parser
{
    public function uri(string $uri, int $component = -1)
    {
        return parse_url($uri,$component);
    }

    public function getUriPart(string $uri, string $part): ?string
    {
        $tmp = $this->uri($uri);
        return (array_key_exists($part, $tmp)) 
            ? $tmp[$part]
            : null;
    }
    
}