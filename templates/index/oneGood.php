<?php 

include($_SERVER['DOCUMENT_ROOT']."/templates/header.php");

?>

<div class="re">
    <a href="/public/index.php">Вернуться на главную</a>
    <br><br>

    <b><?= $content['nameGoods'] ?></b><br><br>
    <img src="/public/images/smallImage/<?= $content['nameImage'] ?>" alt="<?=  $content['nameImage'] ?>">
    <div class="text">
       
        <?= $content['fullDescription'] ?>
    
    </div>
</div>
<a href="/public/index.php?c=Basket&act=Add&id_good=<?= $content['id_good'] ?>&ReturnView=OneGood"><button>Добавить в корзину</button></a>



<?php  include($_SERVER['DOCUMENT_ROOT']."/templates/footer.php");  ?>
