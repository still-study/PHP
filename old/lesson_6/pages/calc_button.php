
<?php
function indexAction()
{
    $result = '';
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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

    echo "<h3>Калькулятор КНОПКИ</h3>
<form method='post' id='calc'>
    <input type='text' name='numOne' placeholder='Первое число'>
    <input type='text' name='numTwo' placeholder='Второе число'>
    <input type='submit' class='button' value='+' name='mathAction'>
    <input type='submit' class='button' value='-' name='mathAction'>
    <input type='submit' class='button' value='*' name='mathAction'>
    <input type='submit' class='button' value='/' name='mathAction'>
    
    
    
</form>
<p>Ответ: {$result}</p>";
}