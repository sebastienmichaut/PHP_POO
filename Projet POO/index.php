<?php

function chargerClass($class){
  require "$class.php";
}

spl_autoload_register("chargerClass");
include "./header.php";

setlocale(LC_TIME, 'fr');
echo "Nous sommes le " . strftime('%A %d %B %Y');
date_default_timezone_set("Europe/Brussels");
echo ", il est " . strftime('%H:%M:%S');
?>
<div class="container">
  <div class="row">
    <h1 class="fst-italic" style="background-color: rgb(0,212,255); font-weight: bold; margin-top: 20px; width: 58.5%">Tous les articles</h1>
      <?php
        $manager = new PostsManager();
        foreach ($manager->getAll() as $post) {
      ?>
        <div class="card mt-3 col-xs-3 col-sm-offset-3 col-md-offset-2 col-md-7">
          <div class="card-body">
            <h5 class="card-title" style="background-color: rgb(0,170,255); font-weight: bold"><?php echo $post->getTitle() ?></h5>
            <p class="card-text"><?php echo $post->getContent() ?></p>
            <p><a href="./readPost.php?id=<?php echo $post->getId() ?>">Voir plus...</a></p>
            <a href="./update.php?id=<?php echo $post->getId() ?>" class="card-link btn btn-warning"><i class="fas fa-edit me-2"></i>Modifier</a>
            <a href="./delete.php?id=<?php echo $post->getId() ?>" class="card-link btn btn-danger"><i class="fas fa-trash-alt me-2"></i>Supprimer</a>
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