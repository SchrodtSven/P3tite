<?php

declare(strict_types=1);
/**
 * Translating http uris to (module &&) controller && action 
 * 
 * @TODO adding rule sets for static routing etc..
 * 
 * default: /$MODULE/$CONTROLLER/$ACTION
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P3tite
 * @package P3tite
 * @version 0.1
 * @since 2022-08-09
 */

namespace P3tite\Mvc;

use P3tite\Communication\Http\Request;
use P3tite\Type\StringClass;
use P3tite\Type\ArrayClass;

class Router
{


    private const DEFAULT_MODULE = 'App';

    private const DEFAULT_CONTROLLER = 'Index';

    private const DEFAULT_ACTION = 'default';

    private string $module = '';

    private string $controller = '';

    private string $action = '';

    public function __construct(Request $request)
    {
        $this->parseUri($request);
    }

    private function parseUri(Request $request)
    {
        $uri = new StringClass($request->getRequestUri(false));
        
        $tmp = $uri->splitBy('/', true, true);
        
        switch (count($tmp)) {
            case 0:
                $this->setModule(self::DEFAULT_MODULE);
                $this->setController(self::DEFAULT_CONTROLLER);
                $this->setAction(self::DEFAULT_ACTION);
                break;

            case 1:
                $this->setModule(self::DEFAULT_MODULE);
                $this->setController(self::DEFAULT_CONTROLLER);
                $this->setAction(mb_strtolower($tmp->get(0)));
                break;

            case 2:
                $this->setModule(self::DEFAULT_MODULE);
                $this->setController(ucfirst(strtolower($tmp->get(0))));
                $this->setAction(mb_strtolower($tmp->get(1)));
                break;


            default:
                $this->setModule(ucfirst(mb_strtolower($tmp->get(0))));
                $this->setController(ucfirst(mb_strtolower($tmp->get(1))));
                $this->setAction(mb_strtolower($tmp->get(2)));
                break;
        }
    }

    /**
     * Get the value of module
     *
     * @return string
     */
    public function getModule(): string
    {
        return $this->module;
    }

    /**
     * Set the value of module
     *
     * @param string $module
     *
     * @return self
     */
    public function setModule(string $module): self
    {
        $this->module = $module;
        return $this;
    }

    /**
     * Get the value of action
     *
     * @return string
     */
    public function getAction(): string
    {
        return $this->action;
    }

    /**
     * Set the value of action
     *
     * @param string $action
     *
     * @return self
     */
    public function setAction(string $action): self
    {
        $this->action = $action;
        return $this;
    }

    /**
     * Get the value of controller
     *
     * @return string
     */
    public function getController(): string
    {
        return $this->controller;
    }

    /**
     * Set the value of controller
     *
     * @param string $controller
     *
     * @return self
     */
    public function setController(string $controller): self
    {
        $this->controller = $controller;
        return $this;
    }
}
