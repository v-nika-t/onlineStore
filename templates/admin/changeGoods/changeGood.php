<?php 

include($_SERVER['DOCUMENT_ROOT']."/templates/headerAdmin.php");?>

<br><br>
<img src="/public/images/smallImage/<?= $content['nameImage'] ?>" alt="">
<form action="/public/admin/index.php?c=ChangeGood&act=Change" method="post" enctype="multipart/form-data">

    <table>
        <tr>
            <td>Загрузите новое изображение</td>
            <td><input type="file" name="dowladfile"></td>
        </tr>

        <tr>
            <td>ID товара</td>
            <td><input type="text" name="id" value="<?= $content['id_good'] ?>" readonly></td>
        </tr>

        <tr>
            <td>Название товара:</td>
            <td><input type="text" name="namegoods" required value="<?= $content['nameGoods'] ?>"></td>
        </tr>

        <tr>
            <td>Цена:</td>
            <td><input type="text" name="prices" required value="<?= $content['prices'] ?>"></td>
        </tr>

        <tr>

            <td>Краткое описание:</td>
            <td>
                <textarea required name="shortDescription" rows="10" cols="45"><?= $content['shortDescription'] ?>
             </textarea>
            </td>
        </tr>
        <tr>
            <td>Полное описание:</td>
            <td>
                <textarea required name="fullDescription" rows="10" cols="45"><?= $content['fullDescription'] ?>
             </textarea>
            </td>
        </tr>

    </table>
    <input type="submit" value="Изменить">

</form>




<?php  include($_SERVER['DOCUMENT_ROOT']."/templates/footer.php");  ?>
