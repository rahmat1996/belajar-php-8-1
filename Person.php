<?php

class Person
{
    public function __construct(public string $name)
    {
    }

    public function sayHello(string $name): string
    {
        return "Hello $name, my name is $this->name";
    }
}

$person = new Person("Rahmat");

$reference = $person->sayHello(...); // use 3 dots to make reference

var_dump($reference("Budi"));
