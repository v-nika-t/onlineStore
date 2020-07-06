<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/public/css/style.css" />

    <title> <?= $title ?> </title>
</head>

<body>

    <?= $_GET['answer'] ?>


    <?php if($_SESSION['id_user']) { ?>


    <ul id='admin'>

        <li><a href="/public/admin/index.php?c=ListUsers&act=View">Пользователи </a></li>
        <li><a href="/public/admin/index.php?c=OpenOrder&act=View">Заказы </a></li>
        <li><a href="/public/admin/index.php?c=ListGood&act=View">Изменить товары </a></li>


    </ul>
    <a href="/public/admin/index.php?c=MainAdmin&act=Logout"><button>Выйти</button></a>
    <?php      }  else {  ?>


    <p>Введите логин и пароль</p>
    <form action="/public/admin/index.php?c=MainAdmin&act=Form" method="post">

        <input type="email" name="login" value=" <?= $_GET['login'] ?> ">
        <input type="password" name="password" value="<?= $_GET['password'] ?>">
        <input type="submit" name="Войти" value='Войти'>

    </form>

    <?php   }  ?>
