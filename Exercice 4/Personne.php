<?php

abstract class Personne{
    private $prenom;
    private $nom;
    private $age;

    public function __construct(string $prenom, string $nom, int $age) {
        $this->setPrenom($prenom);
        $this->setNom($nom);
        $this->setAge($age);
    }

    final public function veillir(): void{
        $this->setAge($this->age++);
    }

    final public function getPrenom(): string{
        return $this->prenom;
    }

    public function setPrenom(string $prenom): void{
        if (strlen($prenom) > 2 && strlen($prenom) < 20) {
            $this->prenom = $prenom;
        }
    }

    final public function getNom(): string{
        return $this->nom;
    }

    public function setNom(string $nom): void{
        if (strlen($nom) > 2 && strlen($nom) < 20) {
            $this->nom = $nom;
        }
    }

    final public function getAge(): int{
        return $this->age;
    }

    public function setAge(int $age): void{
        if ($age > 18  && $age < 120) {
            $this->age = $age;
        }
    }
    
    public function afficher(): void{
        echo "{$this->getPrenom()} {$this->getNom()} a {$this->getAge()} ans. ";
    }

    abstract public function estCelibataire(): bool;
}