<?php
function indexAction()
{
    return render('orderForm');
}

function addOrderAction()
{
    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
        header('Location: /?p=cart&a=index&pressed=1');
        return;
    }

    if (empty($_POST['fullName']) || empty($_POST['address'])
        || empty($_POST['commentOrder']) || empty($_POST['paymentMethod'])) {
        setMSG('Заполните все поля');
        header('Location: /?p=cart&a=index&pressed=1');
        return;
    }

    $_SESSION['orders']['fullName'] = $_POST['fullName'];
    $_SESSION['orders']['address'] = $_POST['address'];
    $_SESSION['orders']['commentOrder'] = $_POST['commentOrder'];
    $_SESSION['orders']['paymentMethod'] = $_POST['paymentMethod'];
    $_SESSION['orders']['items'] = json_encode($_SESSION['goods'], JSON_UNESCAPED_UNICODE);
    $_SESSION['orders']['dateOrder'] = date("Y-m-d H:i:s");
    $_SESSION['orders']['userId'] = $_SESSION['userId'];
    $_SESSION['orders']['status'] = 'Ожидает обработки';
    redirect('/?p=order&a=showResult');
}

function showResultAction()
{
    $cartItems = json_decode($_SESSION['orders']['items'], assoc);
    return render('resultOrder', [
        'title' => 'Данные о заказе',
        'cartItems' => $cartItems,
    ]);
}

function renderPersonalAccountAction()
{
    if (!empty($_GET['pressed'])) {
        $fullName = $_SESSION['orders']['fullName'];
        $address = $_SESSION['orders']['address'];
        $commentOrder = $_SESSION['orders']['commentOrder'];
        $paymentMethod = $_SESSION['orders']['paymentMethod'];
        $items = $_SESSION['orders']['items'];
        $dateOrder = $_SESSION['orders']['dateOrder'];
        $userId = $_SESSION['orders']['userId'];
        $status = $_SESSION['orders']['status'];
        $totalPrice = $_SESSION['orders']['totalPrise'];
        $sql = "INSERT INTO orders (user_id, items, status, full_name, address, comment_order, payment_method, date_order, total_price)
VALUES ('{$userId}', '{$items}', '{$status}', '{$fullName}', '{$address}', '{$commentOrder}', '{$paymentMethod}', '{$dateOrder}', '$totalPrice')";
        mysqli_query(getLink(), $sql);
        unset($_SESSION['goods']);
        unset($_SESSION['orders']);
    }

    return render('personalAccount', [
        'title' => 'Ваш личный кабинет',
    ]);
}

function updateStatusAction()
{
    $status = $_POST['status'];
    $sql = "UPDATE orders SET status = '{$status}' WHERE id = '{$_GET['id']}'";
    mysqli_query(getLink(), $sql);
    redirect();
}

function detailsOrderAction()
{
    $sql = "SELECT * FROM orders WHERE id= '{$_GET['id']}'";
    $result = mysqli_query(getLink(), $sql);
    $order = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return render(
        'detailsOrder', [
        'title' => 'Подробнее: Заказ № ' . $_GET['id'],
        'order' => $order,
    ]);
}