<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userName = $_POST['userName'];
    $text = $_POST['text'];
    $nowDate = $_POST['date'];
    $goodId = $_POST['good-id'];
    $sql = "INSERT INTO feedback (userName, good-id, text, nowDate)
            VALUES ('{$userName}', '$goodId', '{$text}','{$nowDate}')";
    var_dump($sql);
    mysqli_query($link, $sql);
    header('Location: ?page=2');
    exit();
}

$content = "<div class='feedback'>
                <h3>Отзывы</h3>
                <p>Место для отзыва</p>
                <h3>Оставить отзыв</h3>
                <form method='post'>
                    <input type='text' name='userName' placeholder='Ваше имя'>
                    <input type='text' name='text' placeholder='Напишите ваш отзыв'>            
                    <input type='text' name='goodId' placeholder='good-id'>
                    <input type='text' name='nowDate' placeholder='2020-12-31'>
                    <input type='submit'>
                </form>
            </div>";
$html = file_get_contents('product.php');
echo str_replace('{{content}}', $content, $html);