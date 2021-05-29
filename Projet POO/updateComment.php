<?php

function chargerClass($class){
  require "$class.php";
}

spl_autoload_register("chargerClass");
include "./header.php";

$manager = new PostsManager();
$comment = $manager->getIdComment($_GET['id']);
if ($_POST) {
    $comment = new Comment([
        'id' => $comment->getId(),
        'commentContent' => $_POST['commentContent'] 
    ]);
    $manager->updateComment($comment);
    header('Location:./index.php');
}
?>
<div class="container">
    <div class="row">
        <h1 class="fst-italic" style="background-color: rgb(0,212,255); font-weight: bold; margin-top: 20px">Modifier un commentaire</h1>
        <div class="card mt-3 col-xs-3 col-sm-offset-3 col-md-offset-2 col-md-7">
            <div class="card-body">
                <form method="post">
                    <div class="mb-3">
                        <label for="title" class="form-label"><?= "<b>Votre titre actuel :</b> {$comment->getCommentContent()}"; ?></label>
                        <input type="text" class="form-control" id="title"  name="commentContent" placeholder="Modifiez votre commentaire ici">
                    </div>
                    <div class="mb-1">
                        <button type="submit" class="btn btn-primary"><i class="far fa-eye me-2"></i>Publier</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php
include "./footer.php"
?>