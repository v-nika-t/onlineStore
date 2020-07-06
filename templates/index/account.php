<?php 

include($_SERVER['DOCUMENT_ROOT']."/templates/header.php");

?>


<table>

    <tr>
        <td>ФИО</td>
        <td><?= $content['user_name'] ?></td>
    </tr>
    <tr>
        <td>Адрес</td>
        <td><?= $content['user_adress'] ?> </td>
    </tr>
    <tr>
        <td>email</td>
        <td><?= $content['user_login'] ?></td>
    </tr>
    <tr>
        <td>Телефон</td>
        <td><?= $content['user_telephone'] ?></td>
    </tr>
    <tr>
        <td>Пароль</td>
        <td><?= $content['user_password'] ?></td>
    </tr>



</table>


<br><br>
<a href="/public/index.php?c=ChangeAccount&act=View"><button>Изменить</button></a>

<?php  include($_SERVER['DOCUMENT_ROOT']."/templates/footer.php");  ?>
