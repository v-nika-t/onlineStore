<?php 

include($_SERVER['DOCUMENT_ROOT']."/templates/headerAdmin.php");

?>
<br><br>
<a href="/public/admin/index.php?c=AddGood&act=View"><button>Добавить товар</button></a>
<br><br>

<div class="container">

    <?php foreach($content as $array) : ?>
    <p><?= $array['nameGoods'] ?></p>

    <div class="img">

        <img src="/public/images/smallImage/<?= $array['nameImage'] ?>" alt="">

    </div>

    <div class="tovar">
        <p>

            <b>Краткое описание товара:</b> <br>
            <?= $array['shortDescription'] ?>

        </p>

        <a href="/public/admin/index.php?c=ChangeGood&act=View&id_good=<?= $array['id_good'] ?>"><button>Изменить</button></a>
        <a href="/public/admin/index.php?c=ListGood&act=Delete&id_good=<?= $array['id_good'] ?>"><button>Удалить</button></a>

    </div>

    <p><b>Цена:</b><?= $array['prices'] ?></p>

    <?php endforeach ?>

</div>


<?php  include($_SERVER['DOCUMENT_ROOT']."/templates/footer.php");  ?>
