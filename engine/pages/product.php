<?php
function indexAction()
{
    return allAction();
}

function allAction()
{
    $sql = "SELECT * FROM images";
    $result = mysqli_query(getLink(), $sql);
    $goods = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return render(
        'goodAll',
        [
            'goods' => $goods,
            'title' => 'Все товары',
        ]
    );
}

function oneAction()
{
    $sql = "SELECT * FROM images WHERE id =" . getId();
    $result = mysqli_query(getLink(), $sql);
    $good = mysqli_fetch_assoc($result);

    $sqlFeed = "SELECT * FROM feedback WHERE goodId =" . getId();
    $resultFeed = mysqli_query(getLink(), $sqlFeed);
    $feedback = mysqli_fetch_all($resultFeed, MYSQLI_ASSOC);

    return render(
            'goodOne',
            [
                'good' => $good,
                'title' => $good['name'],
            ]
        ) . renderTmpl('feedback', ['feedback' => $feedback]);
}

function addFeedbackAction()
{
    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
        header('Location: /?p=product&a=one&id={$goodId}');
        return;
    }
    $userName = $_POST['userName'];
    $text = $_POST['text'];
    $dateFeed = date("Y-m-d H:i:s");
    $goodId = getId();
    $sql = "INSERT INTO feedback (userName, text, dateFeed, goodId)
VALUES ('{$userName}', '{$text}', '{$dateFeed}', '{$goodId}')";
    mysqli_query(getLink(), $sql);
    header("Location: /?p=product&a=one&id={$goodId}");
}