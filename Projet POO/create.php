<?php

function chargerClass($class){
    require "$class.php";
}

spl_autoload_register("chargerClass");
include "./header.php";

if ($_POST) {
    $manager = new PostsManager();
    $post = new Post($_POST);
    $manager->create($post);
    header('Location:./index.php');
}

?>
<h1>Rédiger un article</h1>
<div class="card mt-3 ms-5" style="width: 30rem">
    <div class="card-body">
        <form method="post">
            <div class="mb-3">
                <label for="title" class="form-label">Votre titre</label>
                <input type="text" class="form-control" id="title"  name="title" placeholder="Ecrivez votre titre ici">
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Votre article</label>
                <textarea class="form-control" rows="5" id="content" name="content" placeholder="Ecrivez votre article ici"></textarea>
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