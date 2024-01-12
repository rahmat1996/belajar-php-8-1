<?php

require_once __DIR__ . "/Category.php";
require_once __DIR__."/Customer.php";

class Product
{
    public function __construct(public string $name = "No Name", public Category $category = new Category("0", "Unknown"))
    {
    }
}

function sayHelloNew(Customer $customer = new Customer("0","Unknown",Gender::Male)){

}

var_dump(new Product());
var_dump(new Product("Ipad"));
var_dump(new Product("Ipad", new Category("1", "Gadget")));

var_dump(sayHelloNew());