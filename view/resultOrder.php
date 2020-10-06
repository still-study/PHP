<?php
echo "<h2 class='header'>Данные о заказе</h2>
            <p>{$showData['full_name']}</p>
            <p>Адрес доставки: {$showData['address']}</p>
            <p>Коментарий к заказу: {$showData['comment_order']}</p>
            <p>Способ оплаты: {$showData['payment_method']}</p>
            <p>Статус заказа: {$showData['status']}</p>
            <h2>Список товаров</h2>";

foreach ($cartItems as $item) {
    echo "<div class='cart-row'>
                <p class=\"paragraph\">Товар: {$item['name']}</p>
                <p class=\"paragraph\">Количество: {$item['count']}</p>
                <p class=\"paragraph\">Цена: {$item['price']}</p>
</div>";
}
