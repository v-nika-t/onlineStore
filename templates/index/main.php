<?php 

include($_SERVER['DOCUMENT_ROOT']."/templates/header.php");

?>

<div class="container">

    <?php foreach($content as $array): ?>
    <p><?= $array['nameGoods']  ?></p>

    <div class="img">


        <img src="/public/images/smallImage/<?= $array['nameImage'] ?>" alt="">

    </div>

    <div class="tovar">

        <p>

            <b>Краткое описание товара:</b> <br>
            <?= $array['shortDescription'] ?>

        </p>


        <a href="/public/index.php?c=Basket&act=Add&id_good=<?= $array['id_good'] ?>&ReturnView=Main"><button>Добавить в корзину</button></a>
        <a href="/public/index.php?c=OneGood&act=View&id_good=<?= $array['id_good'] ?>"><button>Подробнее </button></a>

    </div>

    <p><b>Цена:</b><?= $array['prices'] ?></p>

    <?php endforeach ?>

</div>

<?php  include($_SERVER['DOCUMENT_ROOT']."/templates/footer.php");  ?>
