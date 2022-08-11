<?php

namespace P3tite\Application\App;

class Foo
{
    public function __call(string $name, array $arguments = [])
    {
        echo 'I am :' . __CLASS__ . ' -> ' . $name;
    }
}