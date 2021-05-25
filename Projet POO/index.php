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
<div class="container">
  <div class="row ">
    <h1>Tous les articles</h1>
      <?php
        $manager = new PostsManager();
        foreach ($manager->getAll() as $post) {
      ?>
        <div class="card mt-3 col-xs-3 col-sm-offset-3 col-md-offset-2 col-md-7">
          <div class="card-body">
            <h5 class="card-title"><?php echo $post->getTitle() ?></h5>
            <p class="card-text"><?php echo $post->getContent() ?></p>
            <p><a href="./readPost.php?id=<?php echo $post->getId() ?>">Voir plus...</a></p>
            <a href="./update.php?id=<?php echo $post->getId() ?>" class="card-link btn btn-warning">Modifier</a>
            <a href="./delete.php?id=<?php echo $post->getId() ?>" class="card-link btn btn-danger">Supprimer</a>
          </div>
        </div>
      <?php  
        }
      ?>
  </div>
</div>


<?php
include "./footer.php"
?>