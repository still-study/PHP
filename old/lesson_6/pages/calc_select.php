<?php
function indexAction()
{
    $result = '';
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $numOne = $_POST['numOne'];
        $numTwo = $_POST['numTwo'];
        $mathAction = $_POST['mathAction'];


        switch ($_POST['mathAction']) {
            case '+':
                $result = $numOne + $numTwo;
                break;
            case '-':
                $result = $numOne - $numTwo;
                break;
            case '*':
                $result = $numOne * $numTwo;
                break;
            case '/':
                $result = $numOne / $numTwo;
                break;
        }
    }

    echo "<h3>Калькулятор SELECT</h3>
<form method='post' id='calc'>
    <input type='text' name='numOne' placeholder='Первое число'>
    <select name='mathAction' form='calc'>
        <option value='+'>Плюс</option>
        <option value='-'>Минус</option>
        <option value='*'>Умножить</option>
        <option value='/'>Разделить</option>
    </select>
    <input type='text' name='numTwo' placeholder='Второе число'>
    <input type='submit' class='button'>
</form>
<p>Ответ: {$result}</p>";
}



