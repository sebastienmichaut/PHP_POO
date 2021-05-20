<?php

final class Homme extends Personne {

    private $epouse;

    public function __construct(string $prenom, string $nom, int $age) {
        parent::__construct($prenom, $nom, $age);
    }

    public function estCelibataire(): bool{
        return $this->epouse ? false : true;
    }

    public function getEpouse(){
        return $this->epouse;
    }

    public function setEpouse (Femme $epouse): void{
        $this->epouse = $epouse;
    }

    public function Marier(Femme $epouse){
        $this->setEpouse($epouse);
        $epouse->setEpoux($this);
    }

    public function displayHomme(): void{
        parent::afficher();
        if ($this->estCelibataire()) {
            echo "Il est célibataire. ";
        }else {
            echo "Il est marié à {$this->getEpouse()->prenom} {$this->getEpouse()->nom}. ";
        }
    }
}   