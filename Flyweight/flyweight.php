<?php

// Flyweight interface
interface Flyweight {
    public function operation($extrinsicState);
}

// Concrete Flyweight
class ConcreteFlyweight implements Flyweight {
    private $intrinsicState;

    public function __construct($intrinsicState) {
        $this->intrinsicState = $intrinsicState;
    }

    public function operation($extrinsicState) {
        echo "ConcreteFlyweight: Intrinsic State = " . $this->intrinsicState . ", Extrinsic State = " . $extrinsicState . "\n";
    }
}

// Flyweight Factory
class FlyweightFactory {
    private $flyweights = [];

    public function getFlyweight($key) {
        if (!isset($this->flyweights[$key])) {
            $this->flyweights[$key] = new ConcreteFlyweight($key);
        }
        return $this->flyweights[$key];
    }

    public function getFlyweightCount() {
        return count($this->flyweights);
    }
}

// Usage
$factory = new FlyweightFactory();

$flyweight1 = $factory->getFlyweight("A");
$flyweight1->operation("First Call");

$flyweight2 = $factory->getFlyweight("A");
$flyweight2->operation("Second Call");

$flyweight3 = $factory->getFlyweight("B");
$flyweight3->operation("Third Call");

echo "Flyweights created: " . $factory->getFlyweightCount() . "\n";
// Output:
// ConcreteFlyweight: Intrinsic State = A, Extrinsic State = First Call
// ConcreteFlyweight: Intrinsic State = A, Extrinsic State = Second Call
// ConcreteFlyweight: Intrinsic State = B, Extrinsic State = Third Call
// Flyweights created: 2

?>
