<?php
// L'interface Observer définit la méthode de mise à jour que tous les observateurs doivent implémenter
interface Observer
{
    public function update($subject);
}

// L'interface Subject définit les méthodes qui permettent aux observateurs de s'inscrire et de se désinscrire du sujet
interface Subject
{
    public function attach($observer);
    public function detach($observer);
    public function notify();
}

// La classe ConcreteSubject implémente l'interface Subject et conserve l'état qui sera observé
class ConcreteSubject implements Subject
{
    private $state;
    private $observers = array();

    public function attach($observer)
    {
        $this->observers[] = $observer;
    }

    public function detach($observer)
    {
        $index = array_search($observer, $this->observers);
        if ($index !== false) {
            unset($this->observers[$index]);
        }
    }

    public function notify()
    {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }

    public function setState($state)
    {
        $this->state = $state;
        $this->notify();
    }

    public function getState()
    {
        return $this->state;
    }
}

// La classe ConcreteObserver implémente l'interface Observer et reçoit des mises à jour du sujet
class ConcreteObserver implements Observer
{
    public function update($subject)
    {
        echo "Le nouvel état est : " . $subject->getState() . "\n";
    }
}

// Code client
$subject = new ConcreteSubject();

$observer1 = new ConcreteObserver();
$observer2 = new ConcreteObserver();
$observer3 = new ConcreteObserver();

$subject->attach($observer1);
$subject->attach($observer2);
$subject->attach($observer3);

$subject->setState("Nouvel état 1");
$subject->setState("Nouvel état 2");

$subject->detach($observer2);

$subject->setState("Nouvel état 3");
