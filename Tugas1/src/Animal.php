<?php

namespace App\Animals;

abstract class Animal
{
    protected $breed;
    protected $color;

    public function __construct($breed, $color)
    {
        $this->breed = $breed;
        $this->color = $color;
    }

    abstract public function makeSound();

    public function getDescription()
    {
        return "This is a {$this->breed} animal and its color is {$this->color}.";
    }

    // Magic method __toString to return the description when object is used in a string context
    public function __toString()
    {
        return $this->getDescription();
    }
}
