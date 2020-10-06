<?php
/** @var array $goods */
?>

<h1 class="header">Корзина</h1>
<div class="cart-index">
    <?php if (empty($goods)) : ?>
        <p class="msg header">Нет товаров</p>
    <?php else : ?>

        <?php foreach ($goods as $id => $good) : ?>
            <?php $total = $good['count'] * $good['price']; ?>

            <div class="cart-row">

                <a href="?p=product&a=one&id=<?= $good['id'] ?>" target=\"blank\">
                    <img class='little-pict' src="<?='../img/' . $good['imgName'] ?>"></a>
                <p class="paragraph">Товар: <?= $good['name'] ?></p>
                <p class="paragraph">Кол-во:
                    <a href='?p=cart&a=decrease&id=<?= $id ?>' class="count-sign">-</a>
                    <?= $good['count'] ?>
                    <a href='?p=cart&a=add&id=<?= $id ?>' class="count-sign">+</a>
                </p>
                <p class="paragraph">Цена: <?= $total ?> р.</p>
                <a class="paragraph" href='?p=cart&a=del&id=<?= $id ?>'>Удалить</a>
            </div>
        <?php endforeach; ?>

    <?php endif; ?>
</div>