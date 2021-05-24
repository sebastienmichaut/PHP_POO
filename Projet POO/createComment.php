<?php

function chargerClass($class){
  require "$class.php";
}

spl_autoload_register("chargerClass");
include "./header.php";

$manager= new PostsManager();
$post = $manager->get($_GET['id']);
?>
<h3>L'article que vous souhaitez commenter</h3>
<div class="card mt-3 mb-5 ms-5" style="width: 30rem;">
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
<h4>Rédiger un commentaire</h4>
<div class="card mt-3 ms-5" style="width: 30rem">
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

<?php
include "./footer.php"
?>