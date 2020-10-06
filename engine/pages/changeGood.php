<?php
function indexAction()
{
    return render('formAddNewGood', ['title' => 'Добавление товара']);
}

function addGoodAction()
{
    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
        header('Location: /?p=addNewGood&a=index');
        return;
    }

    if (empty($_POST['name']) || empty($_POST['price'])
        || empty($_POST['description']) || $_FILES['imgName']['size'] == 0) {
        setMSG('Заполните все поля');
        header('Location: /?p=addNewGood&a=index');
        return;
    }

    var_dump($_FILES['imgName']['name']);
    $nameGood = $_POST['name'];
    $priceGood = $_POST['price'];
    $descriptionGood = $_POST['description'];
    $imgName = $_FILES['imgName']['name'];
    move_uploaded_file($_FILES['imgName']['tmp_name'], dirname(__DIR__, 2) . '/public/img/' . $_FILES['imgName']['name']);
    $sql = "INSERT INTO images (name, imgName, price, description)
VALUES ('{$nameGood}', '{$imgName}', '{$priceGood}', '{$descriptionGood}')";
    mysqli_query(getLink(), $sql);
    header('Location: /?p=product');
}

function delGoodAction()
{
    
}