<?php

class Chien {
    // Attributs
    private $nom;
    private $taille;
    
    // Méthodes
    public function renommer($nom){
        echo "Le chien s'appelle : $nom <br>";
    }

    public function grandir($taille){
        echo "Il mesure maintenant : $taille cms";
    }
}

$Rex = new Chien();
$Rex->renommer("Rex");
$Rex->grandir(80);
