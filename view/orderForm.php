<form class="reg-form content" method="post" action="?p=order&a=addOrder">
    <input name="fullName" placeholder="Фамиля Имя Отчество">
    <input name="address" placeholder="Введите адрес доставки">
    <input name="commentOrder" placeholder="Коментарий к заказу">
    <select name="paymentMethod">
        <option disabled>Выберете способ оплаты</option>
        <option value="Наличный">Наличный</option>
        <option value="Безаличный">Безаличный</option>
    </select>
    <input type="submit" style="height: 30px" value="Оформить заказ">

</form>