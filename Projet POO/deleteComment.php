<?php

function chargerClass($class){
    require "$class.php";
}

spl_autoload_register("chargerClass");

$manager = New PostsManager();
$manager->deleteComment($_GET['id']);
header('Location:./index.php');
?>