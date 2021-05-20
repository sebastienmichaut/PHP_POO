<?php

function chargerClasse($classe){
    require "$classe.php";
}

spl_autoload_register("chargerClasse");

$seb = new Homme("Sebastien", "Michaut", 42);
$seb->displayHomme();
$mel = new Femme("Melissa", "Michaut", 42);
$mel->Marier($seb);
$mel->displayFemme();