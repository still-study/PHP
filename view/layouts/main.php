<?php
/**@var string $msg */
/**@var string $content */
/**@var int $countGoodsInCart */
/**@var string $title */
/**@var string $enterName */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/css/style.css">

</head>
<body>

<?php
//var_dump($_FILES);
?>
<nav>
    <div class="left-nav">
        <ul>
            <li><a href="?p=index">Главная</a></li>
            <li><a href="?p=product">Товары</a></li>
        </ul>
    </div>
    <div class="right-nav">
        <ul>
            <li><a href="?p=cart">Корзина <span class="cart_count"><?= $countGoodsInCart ?></span></a></li>
        </ul>
    </div>
</nav>
<div class="user-info"><?= $enterName ?></div>
<p class="msg"><?= $msg ?></p>

<?= $content ?>

<script src="/js/script.js"></script>
</body>
</html>

