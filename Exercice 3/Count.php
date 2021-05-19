<?php

class Count{
    private static $count = 0;

    public function __construct() {
        self::$count++;
    }

    public static function affichage(){
        echo self::$count;
    }
}

$nouveau = new Count();
$nouveau2 = new Count();
$nouveau3 = new Count();
Count::affichage();