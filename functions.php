<?php
// безопасность
require_once 'mysql_helper.php';

// удобочитаемая функция информации о переменной
function debug($arr)
{
    echo '<pre>' . print_r($arr, true) . '</pre>';
}

// функция для шаблонизации

function include_template($path, $data)
{
    if (!file_exists($path)) {
        return '';
    }
    ob_start();
    extract($data);
    require_once($path);

    return ob_get_clean();
}
// функция для экранирования апострофов
function clear()
{
    global $db;
    foreach ($_POST as $key => $value) {
        $_POST[$key] = mysqli_real_escape_string($db, $value);
    }
}
