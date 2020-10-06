<?php
/**@var array $goods */
?>

<h1 class="header">Товары</h1>
<?php renderAdminTmpl("
                <a class='addProductAdmin' href='?p=changeGood&a=index'>+ + ДОБАВИТЬ НОВЫЙ ТОВАР + +</a>
            ") ?>
<div class="content">
    <? foreach ($goods as $good) : ?>
        <div class='products'>
            <a href="?p=product&a=one&id=<?= $good['id'] ?>" target=\"blank\"><h2><?= $good['name'] ?></h2></a>
            <a href="?p=product&a=one&id=<?= $good['id'] ?>" target=\"blank\"><img class='little-pict'
                                                                                   src=<?= "/img/" . $good['imgName'] ?>></a>
            <p>Цена: <?= $good['price'] ?> p.</p>
            <p class='description'><?= $good['description'] ?></p>
            <a href='?p=cart&a=add&id=<?= $good['id'] ?>' class='button'>Добавить в корзину</a>
            <p class="addToCart" onclick="addGood(<?= $good['id'] ?>)">Добавить в корзину (AJAX)</p>
            <?php renderAdminTmpl("
                <a href='?p=changeGood&a=editGood&id={$good['id']}' class='button' style='background-color: darkgray'>Редактировать товар</a>
                <a href='?p=changeGood&a=delGood&id={$good['id']}' class='button' style='background-color: #ff6c56'>Удалить товар</a>
            ") ?>


        </div>

    <?php endforeach; ?>
</div>