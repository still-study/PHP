<?php

$result = mysqli_query($link, "SELECT * FROM images WHERE id =" . getId());
$html = '';
$value = mysqli_fetch_assoc($result);
    $html .= "<div class='one-product'>
                <h2>$value[name]</h2>
                <a href=\"?page=2&id=$value[id]\"><img class='fullscreen' src=$value[url]></a>
                <p class='price'>Цена: $value[price] p.</p>
                <p class='description-one'>$value[description]</p>
              </div>";

echo $html;

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userName = $_POST['userName'];
    $text = $_POST['text'];
    $dateFeed = date("Y-m-d H:i:s");
    $goodId = getId();
//    $goodId = $_POST['good-id'];
    $sql = "INSERT INTO feedback (userName, text, dateFeed, goodId)
            VALUES ('{$userName}', '{$text}', '{$dateFeed}', '{$goodId}')";
    var_dump($sql);
    mysqli_query($link, $sql);
    header("Location: ?page=2&id={$value[id]}");
    exit();
}


$resultFeed = mysqli_query($link, "SELECT * FROM feedback WHERE goodId =" . getId());
//$resultFeed = mysqli_query($link, "SELECT * FROM feedback");

//$valueFeed = mysqli_fetch_assoc($resultFeed);

$htmlFeed = "<div class='feedback'>
                <h3 class='header-feed'>Отзывы</h3>
                    {{feedReplaceContent}}
                <h3 class='header-form'>Оставить отзыв</h3>
                <form method='post'>
                    <input type='text' name='userName' placeholder='Ваше имя'>
                    <input type='text' name='text' placeholder='Напишите ваш отзыв'>            
                    <input type='submit' class='button'>
                </form>
            </div>";

while ($valueFeed = mysqli_fetch_assoc($resultFeed)) {
    $feedReplaceContent .= "<div class='feed-content'>
                    <div class='header-feed-box'>
                        <p class='feed-username'>{$valueFeed[userName]}</p>
                        <p class='feed-date'>{$valueFeed[dateFeed]}</p>
                    </div>
                    <p class='feed-box'>{$valueFeed[text]}</p>
                  </div>";
}
echo str_replace('{{feedReplaceContent}}', $feedReplaceContent, $htmlFeed);
