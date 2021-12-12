<?php
class Person {
public $name;
public $age;

class function sentence{

return $this->name . 'is' . $this->age .'years old';
}


}

$person = new Person;
$person->name = 'Jewel';
$person->age = 21;


echo $person->sentence;
