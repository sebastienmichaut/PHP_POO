<?php

function chargerClass($class){
  require "$class.php";
}

spl_autoload_register("chargerClass");
include "./header.php";

$manager= new PostsManager();
$post = $manager->get($_GET['id']);
if ($_POST) {
    $post = new Post([
        'id' => $post->getId(),
        'title' => $_POST['title'],
        'content' => $_POST['content'] 
    ]);
    $manager->update($post);
    header('Location:./index.php');
}
?>
<div class="container">
    <div class="row">
        <div class="card mt-3 col-xs-3 col-sm-offset-3 col-md-offset-2 col-md-7">
            <h1 style="background-color: rgb(0,212,255); font-weight: bold">Modifier un article</h1>
            <div class="card-body">
                <form method="post">
                    <div class="mb-3">
                        <label for="title" class="form-label"><?= "<b>Votre titre actuel :</b> {$post->getTitle()}"; ?></label>
                        <input type="text" class="form-control" id="title"  name="title" placeholder="Modifiez votre titre ici">
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label"><?= "<b>Votre article actuel :</b> {$post->getContent()}"; ?></label>
                        <textarea class="form-control" rows="5" id="content" name="content" placeholder="Modifiez votre article ici"></textarea>
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