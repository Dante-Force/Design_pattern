<?php

// Subject interface
interface Subject {
    public function request();
}

// Real Subject
class RealSubject implements Subject {
    public function request() {
        echo "RealSubject: Handling request.\n";
    }
}

// Proxy
class Proxy implements Subject {
    private $realSubject;

    public function request() {
        if ($this->realSubject == null) {
            $this->realSubject = new RealSubject();
        }
        echo "Proxy: Checking access prior to firing a real request.\n";
        $this->realSubject->request();
    }
}

// Usage
$proxy = new Proxy();
$proxy->request();
// Output:
// Proxy: Checking access prior to firing a real request.
// RealSubject: Handling request.

?>
