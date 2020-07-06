<?php

include($_SERVER['DOCUMENT_ROOT']."/templates/header.php");

?>

<form action="/public/index.php?c=Basket&act=CheckOut" method="post">
    <table>
        <tr>
            <td>Название товара</td>
            <td>Количество</td>
            <td>Цена за штуку</td>
            <td>Удалить</td>
        </tr>


        <?php if($content)foreach($content as $array): ?>


        <tr>

            <td><?= $array['nameGoods'] ?></td>


            <td><input type='text' name='<?= $array['id_good'] ?>' value="<?= $array['count'] ?> " readonly></td>


            <td><?= $array['prices'] ?></td>

            <td><a href="/public/index.php?c=Basket&act=Delete&id_good=<?= $array['id_good'] ?>">X</a></td>

        </tr>

        <?php endforeach; ?>

        <tr>
            <td>Общая стоимость:</td>
            <td colspan="3"><?= $sum ?> $</td>
        </tr>
    </table>
    <br><br>
    <input type="submit" value="Оформить">

</form>
<?php  include($_SERVER['DOCUMENT_ROOT']."/templates/footer.php");  ?>
