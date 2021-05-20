<?php

function chargerClass($class){
    require "$class.php";
}

spl_autoload_register("chargerClass");
include "./header.php";

//  --------------------------------------------------
/*$data = [
    "title" => "Mon premier article",
    "content" => "Mon premier contenu pour tester le modèle et le contrôleur",
];

$first = new Post($data);
$manager = new PostsManager();
$manager->create($first);*/

// --------------------------------------------------

?>
<h1>Tous les articles</h1>

<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="card-link">Card link</a>
    <a href="#" class="card-link">Another link</a>
  </div>
</div>


<?php
include "./footer.php"
?>