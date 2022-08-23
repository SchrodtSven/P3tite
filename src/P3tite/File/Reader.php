<?php

declare(strict_types=1);
/**
 * Class handling reading operations on file(s)
 * - each line will be trimmed by default and be instantiated as StringClass
 * 
 * @TODO handle binary content!!
 * 
 *  *dragons be here, if large files r used!*
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P3tite
 * @package P3tite
 * @version 0.1
 * @since 2022-08-15
 */

namespace P3tite\File;

use P3tite\Type\ArrayClass;
use P3tite\Type\StringClass;


class Reader extends ArrayClass
{
    public function __construct(string $name, bool $trim = true)
    {
        if (!file_exists($name)) {
            throw new FileException(sprintf(FileException::FILE_NOT_FOUND, $name));
        }

        $this->content = file($name);
        $this->walk(
            function (&$item) use ($trim) {
                $item = new StringClass($item);
                if($trim) {
                    $item->trim();
                }
            }
        );
    }
}
