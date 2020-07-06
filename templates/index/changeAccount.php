<?php
include($_SERVER['DOCUMENT_ROOT']."/templates/header.php");
?>


<form action="/public/index.php?c=ChangeAccount&act=Change" method="post" enctype="multipart/form-data">

    <table>

        <tr>
            <td>ФИО</td>
            <td><input type="text" name="user_name" value="<?= $content['user_name'] ?>" required></td>
        </tr>

        <tr>
            <td>Адрес:</td>
            <td><input type="text" name="user_adress" value="<?= $content['user_adress'] ?> " required></td>
        </tr>

        <tr>
            <td>email:</td>
            <td><input type="text" name="user_login" value="<?= $content['user_login'] ?>" required></td>
        </tr>
        <tr>
            <td>Телефон</td>
            <td><input type="text" name="user_telephone" value="<?= $content['user_telephone'] ?>" required></td>
        </tr>
        <tr>
            <td>Пароль:</td>
            <td><input type="password" name="user_password" value="<?= $content['user_password'] ?>" required></td>
        </tr>


    </table>

    <br><br>
    <input type="submit" value="Изменить">

</form>




<?php  include($_SERVER['DOCUMENT_ROOT']."/templates/footer.php");  ?>
