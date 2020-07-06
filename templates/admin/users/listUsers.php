<?php 

include($_SERVER['DOCUMENT_ROOT']."/templates/headerAdmin.php");

?>

<p>Список пользователей:</p>
<a href="/public/admin/index.php?c=AddUser&act=View"><button>Добавить пользователя</button></a>
<td>
    <br><br>


    <br>
    <table>
        <tr>
            <td>email</td>
            <td>ФИО</td>

        </tr>


        <?php if($content) foreach ($content as $array): ?>
        <tr>
            <td><?= $array['user_login'] ?></td>
            <td><?= $array['user_name'] ?></td>
            <td><a href="/public/admin/index.php?c=ChangeUser&act=View&id_user=<?= $array['id_user'] ?>"><button>Изменить</button></a></td>
            <td><a href="/public/admin/index.php?c=ListUsers&act=Delete&id_user=<?= $array['id_user'] ?>"><button>Удалить</button></a></td>

        </tr>
        <?php endforeach ?>
    </table>





    <?php  include($_SERVER['DOCUMENT_ROOT']."/templates/footer.php");  ?>
