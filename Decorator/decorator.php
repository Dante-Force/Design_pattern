<?php

// Component interface
interface Coffee {
    public function cost();
    public function description();
}

// Concrete Component
class SimpleCoffee implements Coffee {
    public function cost() {
        return 5;
    }

    public function description() {
        return "Simple coffee";
    }
}

// Decorator base class
abstract class CoffeeDecorator implements Coffee {
    protected $coffee;

    public function __construct(Coffee $coffee) {
        $this->coffee = $coffee;
    }

    public function cost() {
        return $this->coffee->cost();
    }

    public function description() {
        return $this->coffee->description();
    }
}

// Concrete Decorators
class MilkDecorator extends CoffeeDecorator {
    public function cost() {
        return $this->coffee->cost() + 2;
    }

    public function description() {
        return $this->coffee->description() . ", with milk";
    }
}

class SugarDecorator extends CoffeeDecorator {
    public function cost() {
        return $this->coffee->cost() + 1;
    }

    public function description() {
        return $this->coffee->description() . ", with sugar";
    }
}

// Usage
$coffee = new SimpleCoffee();
echo $coffee->description() . ": $" . $coffee->cost() . "\n"; // Output: Simple coffee: $5

$coffeeWithMilk = new MilkDecorator($coffee);
echo $coffeeWithMilk->description() . ": $" . $coffeeWithMilk->cost() . "\n"; // Output: Simple coffee, with milk: $7

$coffeeWithMilkAndSugar = new SugarDecorator($coffeeWithMilk);
echo $coffeeWithMilkAndSugar->description() . ": $" . $coffeeWithMilkAndSugar->cost() . "\n"; // Output: Simple coffee, with milk, with sugar: $8

?>
