<?php
    require_once "inc/lib.inc.php";

    global $authorLastId;
    global $genreLastId;

    /** get All data */

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $title = htmlspecialchars($_POST['title']);
        $descr = htmlspecialchars($_POST['short_descr']);
        $author = htmlspecialchars($_POST['author']);
        $genre = htmlspecialchars($_POST['genre']);
        $price = abs($_POST['price']);
    }
    if($title == ' ' || $descr == ' ' || $author == ' ' || $genre == ' ' || $price == ' ') {
        echo "Ошибка при записи (заполните все поля)";
    } else {
        /** INSERT new book */

        $newBook = new Book();
        $newBook->title = $title;
        $newBook->descr = $descr;
        $newBook->price = $price;
        $bookLastId = $newBook->createBook();

        /** calculate & INSERT unique author */

        foreach($allAuthors as $itemAuthor) {
            if($itemAuthor['author_name'] === $author)
                $authorLastId = $itemAuthor['author_id'];
        }
        if(!$authorLastId) {
            $newAuthor = new Author();
            $newAuthor->author = $author;
            $authorLastId = $newAuthor->createAuthor();
        }

        /** calculate & INSERT a unique genre */ 
        
        foreach($allGenres as $itemGenre) {
            if($itemGenre['genre_name'] === $genre)
                $genreLastId = $itemGenre['genre_id'];
        }
        if(!$genreLastId) {
            $newGenre = new Genre();
            $newGenre->genre = $genre;
            $genreLastId = $newGenre->createGenre($genre);
        }

        /** record in the binding tables */

        $link->recordById("INSERT INTO authors_book(author_id, book_id) VALUES ('$authorLastId', '$bookLastId')");
        $link->recordById("INSERT INTO genres_book(book_id, genre_id) VALUES ('$bookLastId', '$genreLastId')");
        
        echo "Новая книга добавлена в каталог";    
}
?>

