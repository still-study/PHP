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
    $sqlImg = "SELECT imgName FROM images WHERE id = {$_GET['id']}";
    $result = mysqli_query(getLink(), $sqlImg);
    $imgDelName = mysqli_fetch_all($result, MYSQLI_ASSOC);
    unlink(dirname(__DIR__, 2) . '/public/img/' . $imgDelName[0]['imgName']);
    $sql = "DELETE FROM images WHERE id = {$_GET['id']}";
    mysqli_query(getLink(), $sql);
    header('Location: /?p=product');
}

function editGoodAction()
{
    $sql = "SELECT * FROM images WHERE id =" . getId();
    $result = mysqli_query(getLink(), $sql);
    $good = mysqli_fetch_assoc($result);
    return render(
        'editGood',
        [
            'good' => $good,
            'title' => 'Редактирование' . ' - "' . $good['name'] . '"',
        ]
    );
}

function updateGoodAction()
{
    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
        header('Location: /?p=addNewGood&a=index');
        return;
    }

    $sqlImg = "SELECT imgName FROM images WHERE id = {$_GET['id']}";
    $result = mysqli_query(getLink(), $sqlImg);
    $imgNameArray = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $imgName = $imgNameArray[0]['imgName'];

    if ($_FILES['imgName']['size'] != 0) {
        unlink(dirname(__DIR__, 2) . '/public/img/' . $imgName);
        move_uploaded_file($_FILES['imgName']['tmp_name'], dirname(__DIR__, 2) . '/public/img/' . $_FILES['imgName']['name']);
        $imgName = $_FILES['imgName']['name'];
    }
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    $sql = "UPDATE images SET name = '{$name}', imgName = '{$imgName}', price = '{$price}', description = '{$description}' WHERE id = {$_GET['id']}";
    mysqli_query(getLink(), $sql);
    header('Location: /?p=product');
}