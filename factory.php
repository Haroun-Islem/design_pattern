<?php // La classe de produit abstraite
abstract class Animal
{
    public abstract function makeSound();
}

// Les classes de produits concrètes
class Dog extends Animal
{
    public function makeSound()
    {
        return 'Woof! Woof!';
    }
}

class Cat extends Animal
{
    public function makeSound()
    {
        return 'Meow! Meow!';
    }
}

// La classe de Factory Simple
class AnimalFactory
{
    public function createAnimal($animalType)
    {
        if ($animalType == 'Dog') {
            return new Dog();
        } elseif ($animalType == 'Cat') {
            return new Cat();
        } else {
            throw new Exception('Type d\'animal inconnu.');
        }
    }
}

// Code client
$factory = new AnimalFactory();

$dog = $factory->createAnimal('Dog');
echo $dog->makeSound(); // affiche "Woof! Woof!"

$cat = $factory->createAnimal('Cat');
echo $cat->makeSound(); // affiche "Meow! Meow!"