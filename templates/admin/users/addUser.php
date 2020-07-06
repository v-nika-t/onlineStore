<?php 

include($_SERVER['DOCUMENT_ROOT']."/templates/headerAdmin.php");

?>


<br><br>
<form action="/public/admin/index.php?c=AddUser&act=Add" method="post" enctype="multipart/form-data">

    <table>


        <tr>
            <td>ФИО</td>
            <td><input type="text" required name="user_name" value="<?= $_GET['user_name'] ?> "></td>
        </tr>

        <tr>
            <td>Адрес:</td>
            <td><input type="text" required name="user_adress" value="<?= $_GET['user_adress'] ?>"></td>
        </tr>

        <tr>
            <td>email:</td>
            <td><input type="text" required name="user_login" value="<?= $_GET['user_login'] ?>"></td>
        </tr>
        <tr>
            <td>Телефон</td>
            <td><input type="text" required name="user_telephone" value="<?= $_GET['user_telephone'] ?>"></td>
        </tr>
        <tr>
            <td>Пароль:</td>
            <td><input type="text" required name="user_password" value="<?= $_GET['user_password'] ?>"></td>
        </tr>


    </table>

    <br><br>
    <input type="submit" value="Добавить">

</form>


<?php  include($_SERVER['DOCUMENT_ROOT']."/templates/footer.php");  ?>
