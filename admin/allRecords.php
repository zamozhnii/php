<?php
    require_once "inc/lib.inc.php";
    if($allBooks === false) {
        echo "Каталог пуст";
        exit;
    }
    
    if($allAuthors === false) {
        echo "Список авторов пуст";
        exit;
    }
    $cnt_a = count($allAuthors);

    if($allGenres === false) {
        echo "Список жанров пуст";
        exit;
    }
    $cnt_g = count($allGenres);
?>