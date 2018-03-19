<?php
    $admin = "zamozhnii@gmail.com";
    $date = date("d.m.y H:i");
    $backUrl = "http://localhost:8888/book_catalog/";

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = (int)($_POST['id']);
        $adress = htmlspecialchars($_POST['adress']);
        $name = htmlspecialchars($_POST['name']);
        $cnt = (int)htmlspecialchars($_POST['quant']);
        $email = htmlspecialchars($_POST['email']);
        $message = htmlspecialchars($_POST['message']);
    }
    $msg = "<p>Адрес: $adress</p>\r\n
    <p>Имя: $name</p>\r\n
    <p>Email: $email</p>\r\n
    <p>Сообщение: $message</p>\r\n
    <p>Книга №: $id</p>\r\n
    <p>Кол-во экземпляров: $cnt";

    if(mail($admin, "$date Сообщение от $name", $msg)) {
        print "<script>
            function reload() {
                location = \"$backUrl\"
            }; setTimeout('reload()', 5000);
            </script>
        $msg
        <p> Сообщение отправлено! Сейчас вы будете перенаправлены на главную страницу...</p>";
        exit;
    }
?>