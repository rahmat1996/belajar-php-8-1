<?php

class Foo
{
    const XX = "Foo";
    final const YY = "Foo";
}

class Bar extends Foo
{
    const XX = "Bar";
    // const YY = "Bar"; // will error cannot overide parent constant after using keyword final
}

echo Foo::XX . PHP_EOL;
echo Bar::XX . PHP_EOL;

echo Foo::YY . PHP_EOL;
echo Bar::YY . PHP_EOL;
