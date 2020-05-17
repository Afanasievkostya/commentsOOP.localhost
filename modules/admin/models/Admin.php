<?php

// Класс сущности главной страницы.
require_once 'models/Database.php';

class Admin extends Database
{
  // метод выбора всех комментариев
  public function get_comments()
  {
      $db = $this->connect();
      $query = "SELECT * FROM messanges ORDER BY id DESC";
      $res = mysqli_query($db, $query);

      return mysqli_fetch_all($res, MYSQLI_ASSOC);
  }

  // метод для удаления комментариев
public function remove_mess($del) {
   $db = $this->connect();
   $query="delete from messanges where id='$del'";
   $res = mysqli_query($db, $query);
}

// метод выбора всех комментариев
public function get_sum()
{
    $db = $this->connect();
    $query = "SELECT * FROM messanges ORDER BY id DESC";
    $res = mysqli_query($db, $query);

    return mysqli_fetch_all($res, MYSQLI_ASSOC);
}

// метод выбирает все значения из users
public function search_user()
{
    $db = $this->connect();
    $query = "select * from users";
    $res = mysqli_query($db, $query);
    return mysqli_fetch_all($res, MYSQLI_ASSOC);
}

// метод для экранирования апострофов
public function clear()
{
    $db = $this->connect();
    foreach ($_POST as $key => $value) {
        $_POST[$key] = mysqli_real_escape_string($db, $value);
    }
}

// метод для записи данных в messangers
public function save_mess()
{
    $db = $this->connect();
    $this->clear();
    extract($_POST); // функция берёт ключи и делает из них переменные
    $_monthsList = [".01." => "января", ".02." => "февраля", ".03." => "марта", ".04." => "апреля", ".05." => "мая", ".06." => "июня", ".07." => "июля", ".08." => "августа", ".09." => "сентября", ".10." => "октября", ".11." => "ноября", ".12." => "декабря"];
    $data = date("d.m.Y");
    $_mD = date(".m.");
    $data = str_replace($_mD, " " . $_monthsList[$_mD] . " ", $data);
    $comment = nl2br(htmlspecialchars($comment)); // Вставляет HTML-код разрыва строки и Преобразует специальные символы в HTML-сущности
    $query = "INSERT INTO messanges (users_id, name_user, image_user, comment, data) VALUES ('$users_id', '$name_user', '$image_user', '$comment', '$data')";
    mysqli_query($db, $query);
}

}
