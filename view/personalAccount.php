<?php
/** @var array $showData */
?>
    <h1 class="header">Личный кабинет</h1>

<?php if (isAdmin()): ?>

    <?php
    $sql = "SELECT id, user_id, items, status, full_name, address, comment_order, payment_method, date_order, total_price FROM orders";
    $result = mysqli_query(getLink(), $sql);
    ?>
    <?php while ($row = mysqli_fetch_assoc($result)) : ?>

        <form class="order-form" method="post" action="?p=order&a=updateStatus&id=<?= $row['id'] ?>">
            <p class="paragraph">Ваш заказ № <?= $row['id'] ?> от <?= $row['date_order'] ?> на сумму
                <?= $row['total_price'] ?> р. --- <?= $row['status'] ?></p>

            <select name="status">
                <option disabled>Выберете статус заказа</option>
                <option value="Заказан">Заказан</option>
                <option value="Оплачен">Оплачен</option>
                <option value="Отправлен">Отправлен</option>
                <option value="Доставлен">Доставлен</option>
            </select>
            <input type="submit" style="height: 30px" value="Изменить статус заказа">
        <a href="/?p=order&a=detailsOrder&id=<?= $row['id'] ?>" style="margin-left: 40px; font-size: 20px;">Подробнее...</a>
        </form>
    <?php endwhile; ?>

<?php else: ?>

    <?php
    $sql = "SELECT id, user_id, items, status, full_name, address, comment_order, payment_method, date_order, total_price FROM orders WHERE user_id = '{$_SESSION['userId']}'";
    $result = mysqli_query(getLink(), $sql);
    ?>
    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
        <div class="cart-row" style="display: flex; flex-direction: column; margin-left: 100px;">
            <p class="paragraph" style="margin-bottom: 30px; margin-top: 30px; height: 40px;">Ваш заказ № <?= $row['id'] ?> от <?= $row['date_order'] ?> на сумму
                <?= $row['total_price'] ?> р. --- <?= $row['status'] ?>
                <a href="/?p=order&a=detailsOrder&id=<?= $row['id'] ?>" class="button" style="margin-left: 40px;">Подробнее</a></p>
        </div>

    <?php endwhile; ?>

<?php endif; ?>