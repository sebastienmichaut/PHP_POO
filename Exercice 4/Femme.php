<?php

final class Femme extends Personne {

    private $epoux;

    public function __construct(string $prenom, string $nom, int $age) {
        parent::__construct($prenom, $nom, $age);
    }

    public function estCelibataire(): bool{
        return $this->epoux ? false : true;
    }

    public function getEpoux (){
        return $this->epoux;
    }

    public function setEpoux (Homme $epoux): void{
        $this->epoux = $epoux;
    }

    public function Marier (Homme $epoux){
        $this->setEpoux($epoux);
        $epoux->setEpouse($this); 
    }

    public function displayFemme(): void{
        parent::afficher();
        if ($this->estCelibataire()) {
            echo "Elle est célibataire. ";
        }else {
            echo "Elle est mariée à {$this->getEpoux()->prenom} {$this->getEpoux()->nom}. ";
        }

    }

}    
