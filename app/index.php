<form action="" method="POST">
    <label>вставь в поле hex-значение опции с 0x: <br>
        <input name='hex' type='text'>
    </label>
    <br>
    <input name='submit_button' type='submit' value='Отправить'>
</form>

<?php
require 'View.php';

$view = new View(); // создаём экземпляр класса
$view->init($_POST["hex"]); // отправляем ему данные из ПОСТа