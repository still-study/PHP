<?php
/**@var array $good */

?>
<h1 class="header">Редактирование</h1>
    <form class="ignore-css content" style="width: 50%; display: flex; flex-direction: column;" method="post" action="?p=changeGood&a=updateGood&id=<?= $good['id'] ?>" enctype="multipart/form-data">
        Название товара<input name="name" placeholder="Название товара" value="<?= $good['name'] ?>">
        <input type="file" name="imgName"><img class='fullscreen' src=<?= "/img/" . $good['imgName'] ?>>
        Цена товара<input name="price" placeholder="Цена" value="<?= $good['price'] ?>">
        Описание товара<input name="description" placeholder="Описание товара" value="<?= $good['description'] ?>">
        <input type="submit" style="height: 30px" value="Внести изменения">
    </form>

