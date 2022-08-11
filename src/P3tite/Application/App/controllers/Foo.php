<?php

namespace P3tite\Application\App\Controllers;

use P3tite\Mvc\ActionController;

class Foo extends ActionController
{
    public function __call(string $name, array $arguments = [])
    {
        echo 'I am :' . __CLASS__ . ' -> ' . $name;
        var_dump($this->getParameter('id'));
    }
}