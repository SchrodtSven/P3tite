<?php

declare(strict_types=1);
/**
 * Class handling errors occuring, when touching file(s)
 * 
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P3tite
 * @package P3tite
 * @version 0.1
 * @since 2022-08-15
 * 
 */

 namespace P3tite\File; 

class FileException extends \ErrorException
{

    public const FILE_NOT_FOUND = 'The file %s does not exist!';

    




}