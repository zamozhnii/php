<?php
    require_once "inc/lib.inc.php";

    $id = abs($_GET['id']);
    $delBook = new Book();
    $delBook->deleteBook($id);
?>