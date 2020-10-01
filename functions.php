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

// функция для проверки имени пользователя.

function checkUser($users, $stok)
{
  // возращаем массив из знач. name массива $users
  $users_name = array_column($users, 'name');
  // проверяем существует ли в массиве имя
  $name = in_array($stok, $users_name, true);

  return $name;
}

// функция с правильным сопряжением

function conjugation_form($col_max, $form1, $form2, $form3)
{
  $col_max = abs($col_max) % 100; // переборка букв алфавита
  $col_min = $col_max % 10; //установка определённых значений для 10% щкончаний

  if ($col_max > 10 && $col_max < 20) return $form3; // записывать слово с окончанием ответ ов
  if ($col_min > 1 && $col_min < 5) return $form2; // записывать слово с окончанием ответ а
  if ($col_min == 1) return $form1; // записывать слово с окончанием ответ

  return $form3; // повторить параметр $form3 если другие не подошли
}
