<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="..\..\public\css\style.css" />

    <title> <?= $title ?> </title>
</head>

<body>

    <?= $_GET['answer'] ?>
    <br><br>
    <?php  if($_SESSION['idUser_rNzTWBtGEZNozETWvgM7'] ){ ?>


    Приветствую тебя: <b><?= $_SESSION['userName_YTGn1t']  ?> </b>
    <br><br>
    <a href="/public/index.php?c=Account&act=View"><button>Перейти в профиль</button></a>
    <a href="/public/index.php?c=Account&act=Logout"><button>Выйти</button></a>
    <br>
    <br>


    <?php } else if($_GET['form'] == 'registration') {

    
    ?>




    <form action="/public/index.php?c=Account&act=Registration" method="post">

        <table>


            <tr>
                <td>ФИО</td>
                <td><input type="text" name="user_name" value="<?= $_GET['user_name'] ?>"></td>
            </tr>

            <tr>
                <td>Адрес:</td>
                <td><input type="text" name="user_adress" value="<?= $_GET['user_adress'] ?>"></td>
            </tr>

            <tr>
                <td>email:</td>
                <td><input type="email" name="user_login" value="<?= $_GET['user_login'] ?> "></td>
            </tr>
            <tr>
                <td>Телефон</td>
                <td><input type="text" name="user_telephone" value="<?= $_GET['user_telephone'] ?>"></td>
            </tr>
            <tr>
                <td>Пароль:</td>
                <td><input type="password" name="user_password" value="<?= $_GET['user_password'] ?>"></td>
            </tr>


        </table>

        <br><br>
        <input type="submit" value="Зарегистрироваться">

    </form>



    <?php } else { ?>


    <form action="/public/index.php?c=Account&act=Form" method="post">
        <input type="email" name="user_login" value='<?= $_GET['user_login'] ?>'>
        <input type="password" name="user_password" value='<?= $_GET['user_password'] ?>'>
        <input type="submit" name="Войти" value='Войти'>
        <input type="submit" name="Регистрация" value='Регистрация'>
    </form>

    <?php }   ?>




    <div class="header">
        <br><br>

        <a href="/public/index.php"> Каталог товаров</a>
        <a href="/public/index.php?c=Basket&act=View">

            <div id="basket1"></div>
        </a>

    </div>
