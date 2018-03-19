<table border="1" cellpadding="5" cellspacing="0" width="80%">
    <tr>
        <th>Название</th>
        <th>Описание</th>
        <th>Жанр</th>
        <th>Автор</th>
        <th>Цена, грн</th>
        <th>Заказать</th>
    </tr>
    <?php 
    foreach($allBooks as $book) { ?>
        <tr>
            <td><?= $book['book_title'] ?></td>
            <td><?= $book['book_descr'] ?></td>
            <td><?= $book['genre'] ?></td>
            <td><?= $book['author'] ?></td>
            <td><?= $book['book_price'] ?></td>
            <td><a class="link-buy" href="order.php?id=<?= $book['book_id'] ?>">Подробнее</a></td>
        </tr>
    <?php } ?>
</table>