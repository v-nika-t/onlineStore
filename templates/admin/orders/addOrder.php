<?php 

include($_SERVER['DOCUMENT_ROOT']."/templates/headerAdmin.php");

?>

<p><?= $_GET['answer'] ?></p>

<form action="/public/admin/index.php?c=AddOrder&act=Add" method="post">
    <table>
        <tr>
            <td>email клиента</td>
            <td><input type="email" name="email" required value="<?= $_GET['email'] ?>"></td>
            <td></td>
        </tr>

        <tr>
            <td>Продукт:</td>
            <td>Кол-во</td>
        </tr>


        <?php for ($i=0; $i<8; $i++) :?>

        <tr>
            <td>
                <select name='id_goods[]'>
                    <option></option>
                    <?php foreach ($content as $array) :?>

                    <option value='<?= $array['id_good'] ?>'><?= $array['nameGoods'] ?></option>

                    <?php endforeach ?>

                </select>
            </td>


            <td><input type="text" value="" name="count[]"></td>


        </tr>

        <?php endfor ?>

        <tr>
            <td> <input type="submit" value="Оформить заказ"></td>
        </tr>

    </table>

</form>


<?php  include($_SERVER['DOCUMENT_ROOT']."/templates/footer.php");  ?>
