<?php

class Chien {
    // Attributs
    private $nom;
    private $taille;
    
    // Méthodes
    public function __construct($nom, $taille){
        $this->renommer($nom);
        $this->grandir($taille);
    }

    public function getNom(): string{
        return $this->nom;                
    }

    public function renommer(string $nom): void{
        if (strlen($nom) > 2 && strlen($nom) < 20) {
            $this->nom = $nom;
        }
    }
                                    
    public function getTaille(): int{    
        return $this->taille;      
    }

    public function grandir($taille){
        if($this->taille < $taille){
            $this->taille = $taille;
        }else{
            echo "Ton chien ne peut pas rétrécir !<br><br>";
        }
    }

    public function displayChien(): void{
        echo "{$this->getNom()} mesure {$this->getTaille()} cms <br>";
    }
}



