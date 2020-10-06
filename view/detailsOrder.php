<?php
/** @var array $order */
?>

<h1 class="header">Заказ № <?= $_GET['id'] ?></h1>
<div class="cart-index">
    <?php foreach ($order as $item) : ?>
    <?php
    $goods = json_decode($item['items'], assoc);
    ?>
    <h2 class='header'>Данные о заказе</h2>
    <p class="paragraph"><?= $item['full_name'] ?></p>
    <p class="paragraph">Адрес доставки: <?= $item['address'] ?></p>
    <p class="paragraph">Коментарий к заказу: <?= $item['comment_order'] ?></p>
    <p class="paragraph">Способ оплаты: <?= $item['payment_method'] ?></p>
    <p class="paragraph">Дата заказа: <?= $item['date_order'] ?></p>
    <p class="paragraph">Сумма заказа: <?= $item['total_price'] ?> р.</p>
</div>

    <h2>Список товаров</h2>";
    <div class="cart-index">
        <?php foreach ($goods as $good) : ?>
            <?php $totalOne = $good['count'] * $good['price']; ?>
            <div class='cart-row'>
                <p class="paragraph">Товар: <?= $good['name'] ?></p>
                <p class="paragraph">Количество: <?= $good['count'] ?></p>
                <p class="paragraph">Цена за еденицу: <?= $good['price'] ?></p>
                <p class="paragraph">Цена общая: <?= $totalOne ?></p>
            </div>
        <?php endforeach; ?>
    </div>

<?php endforeach; ?>
