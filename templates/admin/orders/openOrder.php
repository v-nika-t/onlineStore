<?php 

include($_SERVER['DOCUMENT_ROOT']."/templates/headerAdmin.php");
?>

<br><br>
<a href="/public/admin/index.php?c=AddOrder&act=View"><button>Добавить заказ</button></a>

<p>Список открытых заявок:</p>


<table>
    <tr>
        <td>Открытые заявки</td>

        <td><a href="/public/admin/index.php?c=CloseOrder&act=View">Закрытые заявки</a></td>

    </tr>
</table>
<br><br>
<table>
    <tr>
        <td>id заказа</td>
        <td>email клиента</td>
    </tr>


    <?php if($content) foreach( $content as $array) : ?>
    <tr>
        <td><a href="/public/admin/index.php?c=OneOrder&act=View&status=open&id_order=<?= $array['id_orders'] ?>"><?= $array['id_orders'] ?></a></td>
        <td><?= $array['user_login'] ?></td>

    </tr>
    <?php endforeach ?>
</table>




<?php  include($_SERVER['DOCUMENT_ROOT']."/templates/footer.php");  ?>
