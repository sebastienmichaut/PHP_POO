<?php

class Maitre {
    private $nom;
    private $prenom;
    private $age;
    private $monChien;
    private $monChien2;

    public function __construct(string $nom, string $prenom, int $age){
        $this->setNom($nom);
        $this->setPrenom($prenom);
        $this->setAge($age);
    }

    public function getNom(){
        return $this->nom;
    }

    public function setNom($nom){
        $this->nom = $nom;
    }

    public function getPrenom(){
        return $this->prenom;
    }

    public function setPrenom($prenom){
        $this->prenom = $prenom;
    }

    public function getAge(){
        return $this->age;
    }

    public function setAge($age){
        $this->age = $age;
    }

    public function getChien(){
        return $this->monChien;
    }

    public function getChien2(){
        return $this->monChien2;
    }

    public function adopter (Chien $nouveauChien): void{
        if ($this->getChien()){
            $this->monChien2 = $nouveauChien;
        }else {
            $this->monChien = $nouveauChien;
        }
    }

    public function abandonner (){
            $this->monChien2 = "";
    }


    public function displayMaitre(){
        if ($this->getChien2()) {
            echo "{$this->getPrenom()} {$this->getNom()} a {$this->getAge()} ans et 2 chiens : <br>";
            $this->getChien()->displayChien();
            $this->getChien2()->displayChien();
        }
        else if ($this->getChien()) {
            echo "{$this->getPrenom()} {$this->getNom()} a {$this->getAge()} ans et un chien : ";
            $this->getChien()->displayChien();
        }else{
            echo"{$this->getPrenom()} {$this->getNom()} a {$this->getAge()} ans et n'a pas de chien. <br><br>";
        }
    }
}