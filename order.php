<?php
    require_once "admin/inc/lib.inc.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/style.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <?php
            if(isset($_GET['id']))
                $id = abs($_GET["id"]);
            if($orders = $link->getItems("SELECT books.book_id, 
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
                                            GROUP BY books.book_id"))
         { ?>
            <nav>
                <a href="index.php" class="add-new-book">На главную</a></p>
            </nav>
            <section class="section-table">
                <table border="1" cellpadding="5" cellspacing="0" width="80%">
                    <tr>
                        <th>Название</th>
                        <th>Описание</th>
                        <th>Жанр</th>
                        <th>Автор</th>
                        <th>Цена, грн</th>
                    </tr>
                    <?php foreach($orders as $order) { ?>
                    <tr>
                        <td><?= $order['book_title'] ?></td>
                        <td><?= $order['book_descr'] ?></td>
                        <td><?= $order['genre'] ?></td>
                        <td><?= $order['author'] ?></td>
                        <td><?= $order['book_price'] ?></td>
                    </tr>
                    <?php } ?>
                </table>
            </section>
        <?php } else {
            echo "Невозможно получить ID книги";
            exit;
        } ?>
        <section class="form-add">
            <form action="post.php" method="post" class="forms-add-new-book">
                <input type="hidden" name="id" value="<?= $id?>"></p>
                <label>Адрес: <input type="text" required placeholder="Введите адрес" name="adress"></label>
                <label>ФИО: <input type="text" required placeholder="Введите ФИО" name="name"></label>
                <label>Количество экземпляров: <input type="text" required placeholder="Введите количество, шт" name="quant"></label>
                <label>Email: <input type="email" required placeholder="Введите email" name="email"></label>
                <label>Сообщение: <textarea required rows="10" cols="45" name="message"></textarea></label>
                <input type="submit" value="Отправить" class="btn-add"></p>
            </form>
        </section>    
    </div>
</body>
</html>