<?php
    require_once "inc/lib.inc.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/style.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <?php
            if(isset($_GET['id'])) {
                $id = abs($_GET['id']);
                $books = $link->getItemById("SELECT books.book_id, 
                                                books.book_title, 
                                                books.book_descr, 
                                                books.book_price, 
                                            SUBSTRING_INDEX (
                                            GROUP_CONCAT(
                                                DISTINCT authors.author_name 
                                                SEPARATOR ', '), ' ',5) AS author,
                                            GROUP_CONCAT(
                                                DISTINCT genres.genre_name 
                                                SEPARATOR ', ') AS genre
                                            FROM books
                                            INNER JOIN authors_book
                                                ON books.book_id = authors_book.book_id
                                            INNER JOIN authors
                                                ON authors_book.author_id = authors.author_id
                                            INNER JOIN genres_book
                                                ON books.book_id = genres_book.book_id
                                            INNER JOIN genres 
                                                ON genres_book.genre_id = genres.genre_id
                                            WHERE books.book_id = \"$id\"
                                            GROUP BY books.book_id");  
                if($books) {
                    foreach($books as $book) { ?>
                    <nav>
                        <a href="../index.php" class="link-buy">На главную</a>
                    </nav>
                    <section class="form-add">
                        <form action="saveUpdate.php" method="POST" class="forms-add-new-book">
                            <input type="hidden" name="id" value="<?= $book['book_id'] ?>">
                            <label>Название: <input type="text" name="title" value="<?= $book['book_title'] ?>"></label>
                            <label>Краткое описание: <input type="text" name="descr" value="<?= $book['book_descr'] ?>"></label>
                            <label>Автор: <input type="text" name="author" value="<?= $book['author'] ?>"></label>
                            <input type="hidden" name="authorUpdate" value="<?= $book['author'] ?>">
                            <label>Жанр: <input type="text" name="genre" value="<?= $book['genre'] ?>"></label>
                            <input type="hidden" name="genreUpdate" value="<?= $book['genre'] ?>">
                            <label>Цена: <input type="text" name="price" value="<?= $book['book_price'] ?>"></label>
                            <input type="submit" value="Редактировать" class="btn-add">
                        </form>
                    </section>
        <?php
                    }
                }   
            }
        ?>
    </div>
</body>
</html>