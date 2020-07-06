<?php 

include($_SERVER['DOCUMENT_ROOT']."/templates/headerAdmin.php");

?>

<p>Список закрытых заявок:</p>


<table>
    <tr>
        <td>Закрытые заявки</td>
        <td><a href="/public/admin/index.php?c=OpenOrder&act=View">Открытые заявки</a></td>
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
        <td><a href="/public/admin/index.php?c=OneOrder&act=View&status=close&id_order=<?= $array['id_orders'] ?>"><?= $array['id_orders'] ?></a></td>
        <td><?= $array['user_login'] ?></td>

    </tr>
    <?php endforeach ?>
</table>




<?php  include($_SERVER['DOCUMENT_ROOT']."/templates/footer.php");  ?>
