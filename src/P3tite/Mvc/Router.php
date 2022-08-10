<?php

declare(strict_types=1);
/**
 * Translating http uris to (module &&) controller && action (&& paramters)  
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


    protected const DEFAULT_MODULE = 'App';

    protected const CONTROLLER_MODULE = 'Index';

    protected const ACTION_MODULE = 'default';

    protected string $module = '';

    protected string $controller = '';
    
    protected string $action = '';

    public function __construct(Request $request)
    {
        $this->parseUri($request);
    }

    protected function parseUri(Request $request)
    {
        $tmp = (new StringClass($request->getRequestUri()))
        ->splitBy('/', true);
        var_dump($tmp);
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