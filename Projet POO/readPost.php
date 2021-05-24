<?php

function chargerClass($class){
  require "$class.php";
}

spl_autoload_register("chargerClass");
include "./header.php";

$manager = new PostsManager();
$post = $manager->get($_GET['id']);
?>

<h1>Lire un article</h1>
  <div class="card mt-3 mb-5 ms-5" style="width: 30rem;">
    <div class="card-body">
      <h5 class="card-title"><?php echo $post->getTitle() ?></h5>
      <p class="card-text"><?php echo $post->getContent() ?></p>
      <a href="./createComment.php?id=<?php echo $post->getId() ?>" class="card-link btn btn-success">Commenter</a>
    </div>
  </div>
<h2>Les commentaires</h2>
<?php

$comments = new PostsManager();

  foreach ($comments->getAllComment($_GET['id']) as $comment) {
      ?>
        <div class="card mt-3 mb-1 ms-5" style="width: 30rem;">
          <div class="card-body">
            <p class="card-text"><?php echo $comment->getCommentContent() ?></p>
          </div>
        </div>  
      <?php        
  }
?>

<?php
include "./footer.php"
?>