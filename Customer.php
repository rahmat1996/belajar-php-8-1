<?php

interface sayHello
{
    function sayHello(): string;
}

trait IndonesiaGender
{
    function inIndonesia(): string
    {
        return match ($this) {
            Gender::Male => "Tuan",
            Gender::Female => "Nyonya"
        };
    }
}

enum Gender: string implements sayHello
{

    use IndonesiaGender;

    case Male = "Mr";
    case Female = "Mrs";

    const UNKNOWN = "Unknown";

    static function fromIndonesia(string $value): Gender
    {
        return match ($value) {
            "Tuan" => Gender::Male,
            "Nyonya" => Gender::Female,
            default => throw new Exception("Unsupported Indonesian Value")
        };
    }

    function sayHello(): string
    {
        return "Hello " . $this->value;
    }
}

class Customer
{
    public function __construct(public string $id, public string $name, public ?Gender $gender)
    {
    }
}

function sayHello(Customer $customer): string
{
    if ($customer->gender == null) {
        return "Hello " . $customer->name;
    } else {
        return "Hello " . $customer->gender->value . '. ' . $customer->name;
    }
}

var_dump(sayHello(new Customer("1", "Rahmat", Gender::Male)));
var_dump(sayHello(new Customer("2", "Shinta", Gender::Female)));
var_dump(sayHello(new Customer("3", "Budi", Gender::from("Mr"))));
var_dump(sayHello(new Customer("4", "Ani", Gender::from("Mrs"))));
var_dump(sayHello(new Customer("5", "Kucing", Gender::tryFrom("Miaw"))));

var_dump(Gender::cases());


var_dump(Gender::Male->sayHello());
var_dump(Gender::Female->sayHello());
var_dump(Gender::Male->inIndonesia());
var_dump(Gender::Female->inIndonesia());
var_dump(Gender::fromIndonesia("Tuan"));
var_dump(Gender::fromIndonesia("Nyonya"));
// var_dump(Gender::fromIndonesia("Salah")); // return error
var_dump(Gender::UNKNOWN);
