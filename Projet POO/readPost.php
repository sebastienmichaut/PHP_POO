<?php

function chargerClass($class){
  require "$class.php";
}

spl_autoload_register("chargerClass");
include "./header.php";

$manager = new PostsManager();
$post = $manager->get($_GET['id']);
$date = new DateTime($post->getDate());
?>
<div class="container">
  <div class="row">
    <h1 style="background-color: rgb(0,212,255); font-weight: bold">Lire un article</h1>
    <div class="card mt-3 col-xs-3 col-sm-offset-3 col-md-offset-2 col-md-7">
      <div class="card-body">
        <h5 class="card-title" style="background-color: rgb(0,170,255); font-weight: bold"><?php echo $post->getTitle() ?></h5>
        <p class="card-text"><?php echo $post->getContent() ?></p>
        <p class="card-text fst-italic" style="font-size: 11px"><?php echo "rédigé le {$date->format('d-m-Y')} à {$date->format('H:i')} " ?></p>
        <a href="./createComment.php?id=<?php echo $post->getId() ?>" class="card-link btn btn-success"><i class="far fa-comment-dots me-2"></i>Commenter</a>
      </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="row">
    <h2 class="mt-5" style="background-color: rgb(0,212,255); font-weight: bold">Les commentaires</h2>
      <?php
      $comments = new PostsManager();
        foreach ($comments->getAllComment($_GET['id']) as $comment) {
          $dateComment = new DateTime($comment->getDateComment());
        ?>
          <div class="card mt-3 col-xs-3 col-sm-offset-3 col-md-offset-2 col-md-7">
            <div class="card-body">
              <p class="card-text"><?php echo $comment->getCommentContent() ?></p>
              <p class="card-text fst-italic" style="font-size: 11px"><?php echo "rédigé le {$dateComment->format('d-m-Y')} à {$dateComment->format('H:i')} " ?></p>
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