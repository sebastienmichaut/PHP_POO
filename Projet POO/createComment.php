<?php

function chargerClass($class){
  require "$class.php";
}

spl_autoload_register("chargerClass");
include "./header.php";

$manager= new PostsManager();
$post = $manager->get($_GET['id']);
?>
<div class="container">
    <div class="row">
        <div class="card mt-3 col-xs-3 col-sm-offset-3 col-md-offset-2 col-md-7">
            <h3 style="background-color: rgb(0,212,255); font-weight: bold">L'article que vous souhaitez commenter</h3>
            <div class="card-body">
            <h5 class="card-title"><?php echo $post->getTitle() ?></h5>
            <p class="card-text"><?php echo $post->getContent() ?></p>
            </div>
        </div>
            <?php
            if ($_POST) {
                $comment = new Comment([
                    'id_post' => $post->getId(),
                    'commentContent' => $_POST['content']
                ]);
                $manager->createComment($comment);
                header('Location:./index.php');
            }
            ?>
        <div class="card mt-3 col-xs-3 col-sm-offset-3 col-md-offset-2 col-md-7">
            <h4 style="background-color: rgb(0,212,255); font-weight: bold">Rédiger un commentaire</h4>
            <div class="card-body">
                <form method="post">
                    <div class="mb-3">
                        <label for="content" class="form-label">Votre commentaire</label>
                        <textarea class="form-control" rows="5" id="content" name="content" placeholder="Ecrivez votre commentaire ici"></textarea>
                    </div>
                    <div class="mb-1">
                        <button type="submit" class="btn btn-primary">Publier</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include "./footer.php"
?>