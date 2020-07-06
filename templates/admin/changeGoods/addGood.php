<?php 

include($_SERVER['DOCUMENT_ROOT']."/templates/headerAdmin.php");
?>


<br><br>
<form action="/public/admin/index.php?c=AddGood&act=Add" method="post" enctype="multipart/form-data">

    <table>
        <tr>
            <td>Загрузите изображение</td>
            <td><input type="file" name="dowladfile"></td>
        </tr>




        <tr>
            <td>Название товара:</td>
            <td><input type="text" name="namegoods" value="<?= $_GET['namegoods'] ?>" required></td>
        </tr>

        <tr>
            <td>Цена:</td>
            <td><input type="text" name="prices" value="<?= $_GET['prices'] ?>" required></td>
        </tr>

        <tr>

            <td>Краткое описание:</td>
            <td>
                <textarea name="shortdescription" rows="10" cols="45" required><?= $_GET['shortdescription'] ?>
             </textarea>
            </td>
        </tr>
        <tr>
            <td>Полное описание:</td>
            <td>
                <textarea name="fulldescription" rows="10" cols="45" required><?= $_GET['fulldescription'] ?>
            </textarea>
            </td>
        </tr>

    </table>
    <br><br>
    <input type="submit" value="Добавить">

</form>


<?php  include($_SERVER['DOCUMENT_ROOT']."/templates/footer.php");  ?>
