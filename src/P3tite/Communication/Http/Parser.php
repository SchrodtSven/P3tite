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
use P3tite\Type\StringClass;

class Parser
{
    public function parseUri(string $uri, int $component = -1)
    {
        return parse_url($uri,$component);
    }

    public function getUriPart(string $uri, string $part): ?string
    {
        $tmp = $this->parseUri($uri);
        return (array_key_exists($part, $tmp)) 
            ? $tmp[$part]
            : null;
    }

    /**
     * Splitting message to header and body part (separated by CRLFCRLF)
     * 
     * @FIXME - optimize message splitting (header size) --> multipart messages exist!
     *
     * @param string $message
     * @return array
     */
    public function splitMessage(string $message) : ArrayClass
    {
        return (new StringClass($message))->splitBy(Protocol::MESSAGE_SEPARATOR);
    }

    public function parseQueryString(string $queryString) : ArrayClass
    {
        mb_parse_str($queryString, $data);
        return new ArrayClass($data);
    }
    
}