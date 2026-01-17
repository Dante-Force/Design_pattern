<?php

// Subsystem classes
class Subsystem1 {
    public function operation1() {
        return "Subsystem1: Ready!\n";
    }
}

class Subsystem2 {
    public function operation2() {
        return "Subsystem2: Go!\n";
    }
}

class Subsystem3 {
    public function operation3() {
        return "Subsystem3: Fire!\n";
    }
}

// Facade
class Facade {
    private $subsystem1;
    private $subsystem2;
    private $subsystem3;

    public function __construct() {
        $this->subsystem1 = new Subsystem1();
        $this->subsystem2 = new Subsystem2();
        $this->subsystem3 = new Subsystem3();
    }

    public function operation() {
        $result = "";
        $result .= $this->subsystem1->operation1();
        $result .= $this->subsystem2->operation2();
        $result .= $this->subsystem3->operation3();
        return $result;
    }
}

// Usage
$facade = new Facade();
echo $facade->operation();
// Output:
// Subsystem1: Ready!
// Subsystem2: Go!
// Subsystem3: Fire!

?>
