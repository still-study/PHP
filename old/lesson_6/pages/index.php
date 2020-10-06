<h1 class="header">Товары</h1>
<div class='content'>

<?php

$result = mysqli_query($link, "SELECT * FROM images");
$html = '';
while ($value = mysqli_fetch_assoc($result)) {
    $html .= "<div class='products'>
                <a href=\"?page=2&id=$value[id]\" target=\"blank\"><h2>$value[name]</h2></a>
                <a href=\"?page=2&id=$value[id]\" target=\"blank\"><img class='little-pict' src=$value[url]></a>
                <p>Цена: $value[price] p.</p>
                <p class='description'>$value[description]</p>
              </div>";
}
echo $html;

?>
</div>