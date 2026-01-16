<?php

// Component interface
interface Component {
    public function operation();
}

// Leaf
class Leaf implements Component {
    private $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function operation() {
        echo "Leaf: " . $this->name . "\n";
    }
}

// Composite
class Composite implements Component {
private $children = [];

    public function add(Component $component) {
        $this->children[] = $component;
    }

    public function remove(Component $component) {
        $key = array_search($component, $this->children);
        if ($key !== false) {
            unset($this->children[$key]);
        }
    }

    public function operation() {
        echo "Composite:\n";
        foreach ($this->children as $child) {
            $child->operation();
        }
    }
}

// Usage
$leaf1 = new Leaf("Leaf 1");
$leaf2 = new Leaf("Leaf 2");
$leaf3 = new Leaf("Leaf 3");

$composite = new Composite();
$composite->add($leaf1);
$composite->add($leaf2);

$subComposite = new Composite();
$subComposite->add($leaf3);

$composite->add($subComposite);

$composite->operation();
// Output:
// Composite:
// Leaf: Leaf 1
// Leaf: Leaf 2
// Composite:
// Leaf: Leaf 3

?>