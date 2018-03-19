<?php
    require_once "admin/inc/lib.inc.php";

    $genr = $_GET['gen'];
    $genreses = $link->getItems("SELECT books.book_id, 
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
                                    WHERE genres.genre_name = \"$genr\"
                                    GROUP BY books.book_id");
?>
<p><a class="link-buy" href="index.php">Просмотреть все книги</a></p>
        <table border="1" cellpadding="5" cellspacing="0" width="80%">
            <tr>
                <th>Название</th>
                <th>Описание</th>
                <th>Жанр</th>
                <th>Автор</th>
                <th>Цена, грн</th>
                <th>Заказать</th>
            </tr>
            <?php foreach($genreses as $genre) { ?>
            <tr>
                <td><?=$genre['book_title']?></td>
                <td><?=$genre['book_descr']?></td>
                <td><?=$genre['genre']?></td>
                <td><?=$genre['author']?></td>
                <td><?=$genre['book_price']?></td>
                <td><a class="link-buy" href="order.php?id=<?= $genre['book_id'] ?>">Подробнее</a></td>
            </tr>
    <?php } ?> 
</table>