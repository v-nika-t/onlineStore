<?php 

include($_SERVER['DOCUMENT_ROOT']."/templates/headerAdmin.php");



?>


<p>Номер заказа:<?= $content[0]['id_orders']?></p>

<table>
    <tr>
        <td>email клиента</td>
        <td>ФИО клиента</td>
        <td>Адрес</td>
        <td>Телефон</td>
    </tr>

    <tr>
        <td><?= $content[0]['user_login'] ?></td>
        <td><?= $content[0]['user_name'] ?></td>
        <td><?= $content[0]['user_adress'] ?></td>
        <td><?= $content[0]['user_telephone'] ?></td>
    </tr>

</table>

<br><br>
<table>
    <tr>
        <td>Название товара</td>
        <td>Количество</td>
        <td>Цена за штуку</td>

    </tr>

    <?php foreach($content as $array):?>
    <tr>
        <td><?= $array['nameGoods'] ?></td>
        <td><?= $array['count'] ?></td>
        <td><?= $array['prices'] ?></td>
    </tr>
    <?php endforeach ?>
    <tr>
        <td>Общая стоимость:</td>
        <td colspan="3"><?= $sum ?> $</td>
    </tr>
</table>

<br><br>
<a href="/public/admin/index.php?c=OneOrder&act=ChangeStatus&id_order=<?= $content[0]['id_orders'] ?>&status=<?= $status ?>"><button><?= $status ?></button></a>


<?php  include($_SERVER['DOCUMENT_ROOT']."/templates/footer.php");  ?>
