<?php
/** @var array $cartItems */
?>
<div class="cart-index">
    <h2 class='header'>Данные о заказе</h2>
    <p class="paragraph"><?= $_SESSION['orders']['fullName'] ?></p>
    <p class="paragraph">Адрес доставки: <?= $_SESSION['orders']['address'] ?></p>
    <p class="paragraph">Коментарий к заказу: <?= $_SESSION['orders']['commentOrder'] ?></p>
    <p class="paragraph">Способ оплаты: <?= $_SESSION['orders']['paymentMethod'] ?></p>
    <p class="paragraph">Дата заказа: <?= $_SESSION['orders']['dateOrder'] ?></p>
</div>
<h2>Список товаров</h2>";
<div class="cart-index">
    <?php foreach ($cartItems as $item) : ?>
        <?php $totalOne = $item['count'] * $item['price'];
        $totalAll += $totalOne; ?>
        <div class='cart-row'>
            <p class="paragraph">Товар: <?= $item['name'] ?></p>
            <p class="paragraph">Количество: <?= $item['count'] ?></p>
            <p class="paragraph">Цена за еденицу: <?= $item['price'] ?></p>
            <p class="paragraph">Цена общая: <?= $totalOne ?></p>
        </div>
    <?php endforeach; ?>
    <p class="paragraph">Итого: <?= $totalAll ?></p>
    <?php $_SESSION['orders']['totalPrise'] = $totalAll ?>
<div class="cart-index">
    <a class="button" href="?p=cart&a=index&pressed=1">Редактировать</a>
    <a class="button" href="?p=order&a=renderPersonalAccount&pressed=1">Завершить оформление</a>

</div>
</div>

