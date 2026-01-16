<?php

// Implementor interface
interface Color {
    public function applyColor();
}

// Concrete Implementors
class RedColor implements Color {
    public function applyColor() {
        return "Red";
    }
}

class BlueColor implements Color {
    public function applyColor() {
        return "Blue";
    }
}

// Abstraction
abstract class Shape {
    protected $color;

    public function __construct(Color $color) {
        $this->color = $color;
    }

    abstract public function draw();
}

// Refined Abstractions
class Circle extends Shape {
    public function draw() {
        return "Drawing a circle with " . $this->color->applyColor() . " color.";
    }
}

class Square extends Shape {
    public function draw() {
        return "Drawing a square with " . $this->color->applyColor() . " color.";
    }
}

// Usage
$redColor = new RedColor();
$blueColor = new BlueColor();

$circle = new Circle($redColor);
echo $circle->draw() . "\n"; // Output: Drawing a circle with Red color.

$square = new Square($blueColor);
echo $square->draw() . "\n"; // Output: Drawing a square with Blue color.

?>
