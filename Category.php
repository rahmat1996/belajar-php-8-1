<?php

class Category
{
    // public readonly string $id; // just once can initial data;
    // public readonly string $name; // just once can initial data;

    // public function __construct(string $id, string $name)
    // {
    //     $this->id = $id;
    //     $this->name = $name;
    // }

    public function __construct(public readonly string $id, public readonly string $name)
    {
    }
}

$category = new Category("1", "Gadget");
var_dump($category->id);

// $category->id = "1234"; // will error cannot modify property
