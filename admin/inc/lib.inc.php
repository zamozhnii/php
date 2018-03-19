<?php  
        function __autoload($class) {
                require "$class.class.php";
        }

        /**
         * qq
         */
        $sqlForAllBooks = "SELECT books.book_id, books.book_title, 
                                  books.book_descr, books.book_price, 
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
                                GROUP BY books.book_id";

        $sqlForAllAuthors = "SELECT author_id, author_name FROM authors";

        $sqlForAllGenres = "SELECT genre_id, genre_name FROM genres";

        $link = new Mypdo();
        $allBooks = $link->getItems($sqlForAllBooks);
        $allAuthors = $link->getItems($sqlForAllAuthors);
        $allGenres = $link->getItems($sqlForAllGenres);
?>