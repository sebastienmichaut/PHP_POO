<?php

function chargerClasse($classe){
    require "$class.php";

}

spl_autoload_register("chargerClasse");


$nouveauChien = new Chien("Pluto", 80);
$nouveauChien->displayChien();

$nouveauChien->grandir(70);

$nouveauChien->renommer("Rex");
$nouveauChien->grandir(90);
$nouveauChien->displayChien();

$seb = new Maitre("Michaut", "Sébastien", 42);
$seb->adopter($nouveauChien);
$seb->displayMaitre();

$bob = new Maitre("l'éponge", "Bob", 25);
$bob->displayMaitre();

$nouveauChien = new Chien("Milou", 45);
$nouveauChien->displayChien();
$bob->adopter($nouveauChien);
$bob->displayMaitre();

$nouveauChien = new Chien ("pluto", 58);
$seb->adopter($nouveauChien);
$seb->displayMaitre();

$seb->abandonner($monChien2);
$seb->displayMaitre();