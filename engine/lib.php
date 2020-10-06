<?php

function getLink()
{
    static $link;
    if (empty($link)) {
        $link = mysqli_connect("localhost", "root", "root", "gallery");
    }
    return $link;
}

function getContent()
{
    $page = 'index';
    if (!empty($_GET['p'])) {
        $page = trim($_GET['p']);
    }

    $fileName = getFullNamePage($page);
    if (!file_exists($fileName)) {
        $fileName = getFullNamePage('index');
    }

    require_once $fileName;

    $action = 'index';
    if (!empty($_GET['a'])) {
        $action = trim($_GET['a']);
    }

    $action .= 'Action';
    if (!function_exists($action)) {
        $action = 'indexAction';
    }

    return $action();

}

function getFullNamePage($page)
{
    return __DIR__ . '/pages/' . $page . '.php';
}

function clearStr($str)
{
    return mysqli_real_escape_string(getLink(), strip_tags(trim($str)));
}

function getId()
{
    if (empty($_GET['id'])) {
        return 0;
    }

    return (int)$_GET['id'];
}

function postId()
{
    if (empty($_POST['id'])) {
        return 0;
    }

    return (int)$_POST['id'];
}

function redirect($path = '')
{
    if (!empty($path)) {
        header('Location: ' . $path);
        return;
    }
    if (isset($_SERVER['HTTP_REFERER'])) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        return;
    }

    header('Location: /');
}

function setMSG($msg)
{
    $_SESSION['msg'] = $msg;
}

function getMSG()
{
    if (empty($_SESSION['msg'])) {
        return '';
    }
    $msg = $_SESSION['msg'];
    unset($_SESSION['msg']);
    return $msg;
}

function goodsCount()
{
    if (empty($_SESSION['goods'])) {
        return '';
    }
    $count = count($_SESSION['goods']);
    return $count;
}

function render($template, $params = [], $layout = 'main')
{
    $content = renderTmpl($template, $params);
    $layout = 'layouts/' . $layout;

    $title = "Интернет-магазин";
    if (!empty($params['title'])) {
        $title = $params['title'];
    }

    return renderTmpl(
        $layout,
        [
            'countGoodsInCart' => goodsCount(),
            'enterName' => showEnterName(),
            'content' => $content,
            'msg' => getMSG(),
            'title' => $title,
        ]
    );
}

function renderTmpl($template, $params = [])
{
    ob_start();
    extract($params);
    include dirname(__DIR__) . '/view/' . $template . '.php';

    return ob_get_clean();
}

function showEnterName()
{
    if (empty($_SESSION['user'])) {
        return "<a href=\"?p=auth&a=saveState&saveState={$_SERVER["REQUEST_URI"]}\">Вход</a> |
<a href=\"?p=registration&a=saveState&saveState={$_SERVER["REQUEST_URI"]}\">Регистрация</a >";
    }
    return "<p class='user-infoName'>Вы вошли как: {$_SESSION['user']}</p>
            <a href=\"?p=order&a=renderPersonalAccount\">Личный кабинет</a> |
            <a href=\"?p=auth&a=out\">Выход</a>";
}

function isAuthorized()
{
    if (!empty($_SESSION['user'])) {
        return true;
    }
}

function isAdmin()
{
    if ($_SESSION['isAdmin'] == 1) {
        return true;
    }
}

function renderAdminTmpl($template)
{
    if(isAdmin()){
        echo $template;
    }
}
