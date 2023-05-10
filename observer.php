<?php

// L'interface Target représente l'interface attendue par le client
interface Target
{
    public function request();
}

// La classe Adaptee représente la classe existante à adapter
class Adaptee
{
    public function specificRequest()
    {
        return "Demande spécifique de l'Adaptee.";
    }
}

// La classe Adapter implémente l'interface Target et adapte la classe Adaptee
class Adapter implements Target
{
    private $adaptee;

    public function __construct(Adaptee $adaptee)
    {
        $this->adaptee = $adaptee;
    }

    public function request()
    {
        return "Adapter: " . $this->adaptee->specificRequest();
    }
}

// Code client
$adaptee = new Adaptee();
$adapter = new Adapter($adaptee);

echo $adapter->request();
