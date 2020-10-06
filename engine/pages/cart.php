<?php
function indexAction()
{
    $buttonOrder = '';
    if (isAuthorized() && !empty($_SESSION['goods'])) {
        $buttonOrder = '<div class="cart-index">
                            <a class="button" href="?p=cart&a=index&pressed=1">Оформить заказ</a>
                        </div>';
    }
    if (!empty($_GET['pressed']) && !empty($_SESSION['goods'])) {
        $buttonOrder = renderTmpl('orderForm');
    }
    return render(
        'cartIndex',
        [
            'goods' => $_SESSION['goods'],
            'title' => 'Корзина',
        ]
    ) . $buttonOrder;
}

function addAjaxAction()
{
    header('Content-Type: application/json');
    $id = postId();
    $success = false;
    if (empty($id)) {
        echo json_encode([
            'success' => $success
        ]);
        return;
    }
    $msg = increaseGood($id);

    if (empty($msg)) {
        $msg = 'Товар успешно добавлен';
        $success = true;
    }
    echo json_encode([
        'success' => $success,
        'msg' => $msg,
        'count' => goodsCount(),
    ]);
}

function addAction()
{
    $msg = increaseGood(getId());
    if (empty($msg)) {
        $msg = 'Товар успешно добавлен';
    }
    setMSG($msg);
    redirect();
}

function increaseGood($id)
{
    if (empty($id)) {
        return 'Не передан ID';
    }

    $result = mysqli_query(getLink(), "SELECT * FROM images WHERE id =" . $id);
    $value = mysqli_fetch_assoc($result);
    if (empty($value)) {
        return 'Товар не найден';
    }
    if (!empty($_SESSION['goods'][$id])) {
        $_SESSION['goods'][$id]['count']++;
        return '';
    }

    $_SESSION['goods'][$id] = [
        'id' => $value['id'],
        'imgName' => $value['imgName'],
        'name' => $value['name'],
        'price' => $value['price'],
        'count' => 1,
    ];

    return '';
}

function decreaseAction()
{
    $msg = decreaseGood(getId());
    if (empty($msg)) {
        $msg = "Товар удален";
    }
    setMSG($msg);
    redirect();
}

function decreaseGood($id)
{
    if ($_SESSION['goods'][$id]['count'] == 1) {
        unset($_SESSION['goods'][$id]);
        return '';
    }

    if (!empty($_SESSION['goods'][$id])) {
        $_SESSION['goods'][$id]['count']--;
        return 'Кол-во уменьшено';
    }


    return '';
}

function delAction()
{
    $id = getId();
    unset($_SESSION['goods'][$id]);
    if (empty($msg)) {
        $msg = "Товар удален";
    }
    setMSG($msg);
    redirect();

}