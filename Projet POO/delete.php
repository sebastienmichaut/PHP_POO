<?php

function chargerClass($class){
    require "$class.php";
}

spl_autoload_register("chargerClass");

$manager = New PostsManager();
$manager->delete($_GET['id']);
header('Location:./index.php');
?>


