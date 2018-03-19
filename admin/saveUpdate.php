<?php

    require_once "inc/lib.inc.php";

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];
        $title = htmlspecialchars($_POST['title']);
        $descr = htmlspecialchars($_POST['descr']);
        $author = htmlspecialchars($_POST['author']);
        $authorUpdate = htmlspecialchars($_POST['authorUpdate']);
        $genre = htmlspecialchars($_POST['genre']);
        $genreUpdate = htmlspecialchars($_POST['genreUpdate']);
        $price = abs($_POST['price']);
    }

    /** Save update book */

    $updateBook = new Book();
    $updateBook->title = $title;
    $updateBook->descr = $descr;
    $updateBook->price = $price;
    $updateBook->updateBook($id);

    /** Save update author */

    $updateAuthor = new Author();
    $updateAuthor->author = $author;
    $updateAuthor->updateAuthor($authorUpdate);

    /** Save update genre */

    $updateGenre = new Genre();
    $updateGenre->genre = $genre;
    $updateGenre->updateGenre($genreUpdate);

    if(!$updateBook && !$updateAuthor && !$updateGenre)
        echo "Не удалось отредактировать книгу";
    header("Location: catalog.php");
    exit;