<?php

declare(strict_types=1);
/**
 * Front controller 
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
use P3tite\Mvc\Router;
use P3tite\Type\ArrayClass; 
use P3tite\Application\Config;

class FrontController
{


    
    private Router $router;

    public function __construct(private Request $request, private Response $response)
    {
        $this->router = new Router($this->request);
       // var_dump($this->router);
       $this->process();
    }

    private function process()
    {
        $fullyQualifiedClass = (new ArrayClass(
            [
                Config::APP_PREFIX,
                $this->router->getModule(),
                $this->router->getController()
            ]
        )) ->join('\\');
            $method = $this->router->getAction();

        (new $fullyQualifiedClass())->$method();
    }
}
