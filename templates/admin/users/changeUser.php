<?php 

include($_SERVER['DOCUMENT_ROOT']."/templates/headerAdmin.php");


?>
<br><br>
<form action="/public/admin/index.php?c=ChangeUser&act=Change&id_user=<?= $content['id_user']?>" method="post" enctype="multipart/form-data">

    <table>


        <tr>
            <td>ФИО</td>
            <td><input type="text" required name="user_name" value="<?= $content['user_name']?>"></td>
        </tr>

        <tr>
            <td>Адрес:</td>
            <td><input type="text" required name="user_adress" value="<?= $content['user_adress']?>"></td>
        </tr>

        <tr>
            <td>email:</td>
            <td><input type="text" required name="user_login" value="<?= $content['user_login']?>"></td>
        </tr>
        <tr>
            <td>Телефон</td>
            <td><input type="text" required name="user_telephone" value="<?= $content['user_telephone']?>"></td>
        </tr>
        <tr>
            <td>Пароль:</td>
            <td><input type="password" required name="user_password" value="<?= $content['user_password']?>"></td>
        </tr>


    </table>

    <br><br>
    <input type="submit" value="Изменить">

</form>




<?php  include($_SERVER['DOCUMENT_ROOT']."/templates/footer.php");  ?>
