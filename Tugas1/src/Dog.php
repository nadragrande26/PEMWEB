<?php

namespace App\Animals;

require_once 'Traits/SoundTrait.php';

use App\Traits\SoundTrait;

class Dog extends Animal
{
    use SoundTrait;

    public function __construct($breed, $color)
    {
        parent::__construct($breed, $color);
    }

    // Implementing the abstract method
    public function makeSound()
    {
        return $this->bark();
    }
}
