<?php

declare(strict_types=1);
/**
 * Abstract action controller class
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P3tite
 * @package P3tite
 * @version 0.1
 * @since 2022-08-11
 */

namespace P3tite\Mvc;

use P3tite\Communication\Http\Request;
use P3tite\Communication\Http\Response;

abstract class ActionController
{


    public function __construct(protected Request $request, protected Response $response)
    {}


    public function getParameter(string $key)
    {
        return $this->request->getParameters()->getByKey($key);
    }

    public function getParameters()
    {
        return $this->request->getParameters();
    }

    
}
