<?php

class Person {
    public $name;
    public $age;

    function __construct($name, $age=18) 
    {
        $this->name = $name; // 把參數 (區域變數) 設定到屬性
        $this->age = $age;
    }

    function getJSON() {
        return json_encode([
            'name' => $this->name,
            'age' => $this->age,
        ], JSON_UNESCAPED_UNICODE);
    }
}

$p1 = new Person('Peter');

echo $p1->getJSON();
