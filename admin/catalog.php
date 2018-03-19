<?php
    require_once "inc/lib.inc.php";

    if($allBooks === false) {
        echo "Каталог пуст";
        exit;
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/style.css">
    <title>Каталог админа</title>
</head>
<body>
    <div class="container">
        <nav>
            <a href="../index.php" class="link-buy link">На главную</a>
            <a href="add2catalog.php" class="link-buy">Добавить книгу</a>
        </nav>
        <section class="section-table">
            <table border="1" cellpadding="5" cellspacing="0" width="80%">
                <tr>
                    <th>Название</th>
                    <th>Описание</th>
                    <th>Жанр</th>
                    <th>Автор</th>
                    <th>Цена, грн</th>
                    <th>Редактировать</th>
                    <th>Удалить</th>
                </tr>
                <?php foreach($allBooks as $book) { ?>
                    <tr>
                        <td><?= $book['book_title'] ?></td>
                        <td><?= $book['book_descr'] ?></td>
                        <td><?= $book['genre'] ?></td>
                        <td><?= $book['author'] ?></td>
                        <td><?= $book['book_price'] ?></td>
                        <td><a href="update.php?id=<?= $book['book_id'] ?>" class="update">Редактировать</a></td>
                        <td><a href="delete.php?id=<?= $book['book_id'] ?>" class="delete">Удалить</a></td>
                    </tr>
                <?php } ?>
            </table>
        </section>
    </div>
    <script src="../assets/del-ajax.js"></script>
</body>
</html>