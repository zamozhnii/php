<?php
    require_once "admin/allRecords.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/style.css">
    <title>Книжный каталог</title>
</head>
<body>
    <div class="container">
        <header>
            <a href="admin/add2catalog.php" class="add-new-book">Перейти к добавлению товара в каталог</a>
        </header>
        <section class="section-forms">
            <form method="get">
                <p>Отсортировать по жанру: </p>
                <select name="gen">
                    <?php
                        foreach($allGenres as $genre) { ?>
                            <option id="optionGenre" value="<?= $genre['genre_name'] ?>"><?= $genre['genre_name'] ?></option>
                        <?php } ?>
                </select>
                <input type="button" name="submit_gen" value="Фильтровать" class="input-filter" />
            </form>
            <form action="<?= $_SERVER['REQUEST_URI'] ?>" method="get">
                <p>Отсортировать по автору</p>
                <select name="auth">
                    <?php
                        foreach($allAuthors as $author) { ?>
                            <option value="<?= $author['author_name'] ?>"><?= $author['author_name'] ?></option>
                        <?php } ?>
                </select>
                <input type="button" name="submit_auth" value="Фильтровать" class="input-filter" />
            </form>
        </section>
        <section class="section-table">
            <?php
                if(isset($_GET['submit_gen'])) include 'filtergenre.php';
                elseif(isset($_GET['submit_auth'])) include 'filterauthor.php';
                elseif(isset($_GET['id'])) include 'order.php';
                else include 'allBooks.php';
            ?>
        </section>
    </div>
    <script src="assets/script.js"></script>
</body>
</html>