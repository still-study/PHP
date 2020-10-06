<?php
/** @var array $feedback */
?>
<div class='feedback'>
    <h3 class='header-feed'>Отзывы</h3>
    <?php foreach ($feedback as $feed) : ?>
        <div class='feed-content'>
            <div class='header-feed-box'>
                <p class='feed-username'><?= $feed['userName'] ?></p>
                <p class='feed-date'><?= $feed['dateFeed'] ?></p>
            </div>
            <p class='feed-box'><?= $feed['text'] ?></p>
        </div>
    <?php endforeach; ?>

    <h3 class='header-form'>Оставить отзыв</h3>
    <form method='post' action="?p=product&a=addFeedback&id=<?= getId() ?>">
        <input type='text' name='userName' placeholder='Ваше имя'>
        <input type='text' name='text' placeholder='Напишите ваш отзыв'>
        <input type='submit' class='button' style="height: 35px">
    </form>
</div>