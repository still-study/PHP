<?php
/**@var array $good */

?>

<div class='one-product'>
    <h2><?= $good['name'] ?></h2>
    <a href="?p=product&a=one&id=<?= $good['id'] ?>"><img class='fullscreen' src= <?= "/img/" . $good['imgName'] ?>></a>
    <p class='price'>Цена: <?= $good['price'] ?> p.</p>
    <p class='description-one'><?= $good['description'] ?></p>
    <a href='?p=cart&a=add&id=<?= $good['id'] ?>' class='button'>Добавить в корзину</a>
</div>



