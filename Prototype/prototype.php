<?php

// Prototype interface
interface Prototype {
    public function clone();
}

// Concrete Prototype
class ConcretePrototype implements Prototype {
    private $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

    public function clone() {
        return new ConcretePrototype($this->name);
    }
}

// Usage
$original = new ConcretePrototype("Original");
$clone = $original->clone();

echo "Original: " . $original->getName() . "\n"; // Output: Original: Original
echo "Clone: " . $clone->getName() . "\n"; // Output: Clone: Original

$clone->setName("Modified Clone");
echo "Original after clone modification: " . $original->getName() . "\n"; // Output: Original after clone modification: Original
echo "Clone after modification: " . $clone->getName() . "\n"; // Output: Clone after modification: Modified Clone

?>
