<?php
function indexAction()
{
    if (!isAuthorized()) {
        return render('authIndex');
    }
    header('Location: ' . $_SESSION['saveState']);
//    redirect($_SESSION['saveState']);
    return;
}


function loginAction()
{
    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
        header('Location: /?p=auth');
        return;

    }
    if (empty($_POST['login']) || empty($_POST['password'])) {
        header('Location: /?p=auth');
        setMSG('Заполните все поля');
        return;
    }

    $login = clearStr($_POST['login']);
    $password = $_POST['password'];

    $sql = "SELECT id, userName, login, password, is_admin FROM users WHERE login = '{$login}'";
    $result = mysqli_query(getLink(), $sql);
    $userData = mysqli_fetch_assoc($result);
    if (empty($userData)) {
        setMSG('Пользователь с таким логином не зарегистрирован');
        redirect('/?p=auth');
        return;
    }
    if (!password_verify($password, $userData['password'])) {
        setMSG('Неверный пароль');
        redirect('/?p=auth');
        return;
    }
    if (!empty($userData) && password_verify($password, $userData['password'])) {
        $_SESSION['user'] = $userData['userName'];
        $_SESSION['userId'] = $userData['id'];
        $_SESSION['isAdmin'] = $userData['is_admin'];
        redirect('/?p=auth');
        return;
    }

}

function outAction()
{
    session_destroy();
    redirect('/');
}

function saveStateAction()
{
    $_SESSION['saveState'] = $_GET['saveState'];
    return indexAction();
}

