<?php
function indexAction()
{
    return render('regForm');
}

function regAction()
{
    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
        header('Location: /?p=registration');
        return;
    }

    $userName = $_POST['userName'];
    $login = $_POST['login'];
    $passFirst = $_POST['password'];
    $passSecond = $_POST['repeatPassword'];
    $is_admin = 0;

    if (empty($userName) || empty($login)
        || empty($passFirst) || empty($passSecond)) {
        setMSG('Заполните все поля');
        header('Location: /?p=registration');
        return;
    }

    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (userName, login, password, is_admin)
VALUES ('{$userName}', '{$login}', '{$password}', '{$is_admin}')";
    if ($passFirst == $passSecond) {
        mysqli_query(getLink(), $sql);
        setMSG('Вы зарегистрированны как: ' . $userName);
        header('Location: /?p=auth');
        return;
    }
        setMSG('Поле пароль не совпадает!');
        header('Location: /?p=registration');
        return;
}

function saveStateAction()
{
    $_SESSION['saveState'] = $_GET['saveState'];
    return indexAction();
}

