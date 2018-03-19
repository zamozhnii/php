<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/style.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <nav>
            <a href="../index.php" class="link-buy link">Вернуться на главную</a>
            <a href="catalog.php" class="link-buy">Перейти в каталог</a>
        </nav>
        <div id="result"></div>
        <section class="form-add">
            <form method="post" name="addbook" class="forms-add-new-book">
                <label>Название: <input type="text" id="name" name="title" size="50" required></label>
                <label>Краткое описание:<textarea id="descr" type="text" name="short_descr" size="100" required></textarea> </label>
                <label>Автор: <input id="author" type="text" name="author" size="50" required></label>
                <label>Жанр: <input id="genre" type="text" name="genre" size="50" required></label>
                <label>Цена: <input id="price" type="float" name="price" required></label>
                <input type="button" value="Добавить" class="btn-add" id="btn-add">
            </form>
        </section>
    </div>
    <script src="../assets/main.js"></script>
</body>
</html>