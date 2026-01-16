<?php

// State interface
interface State {
    public function handle(Context $context);
}

// Concrete States
class ConcreteStateA implements State {
    public function handle(Context $context) {
        echo "Handling in State A\n";
        $context->setState(new ConcreteStateB());
    }
}

class ConcreteStateB implements State {
    public function handle(Context $context) {
        echo "Handling in State B\n";
        $context->setState(new ConcreteStateA());
    }
}

// Context
class Context {
    private $state;

    public function __construct(State $state) {
        $this->state = $state;
    }

    public function setState(State $state) {
        $this->state = $state;
    }

    public function request() {
        $this->state->handle($this);
    }
}

// Usage
$context = new Context(new ConcreteStateA());
$context->request(); // Output: Handling in State A
$context->request(); // Output: Handling in State B
$context->request(); // Output: Handling in State A

?>