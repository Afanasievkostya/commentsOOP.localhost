<?php

// Класс сущности страницы регистрации для комментаий.
require_once 'Database.php';
require_once 'mysql_helper.php';

class User extends Database
{

  // фукция выбирает все значения из users
public function search_user() {
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
  // функция для записи в users если аватар выбран
public function save_user($file) {
    $db = $this->connect();
    clear();
    extract($_POST); // функция берёт ключи и делает из них переменные
    $name = htmlspecialchars($name); // функция Преобразует специальные символы в HTML-сущности
    $name = base64_encode($name); // функция шифрование имени
    $pas = password_hash($password, PASSWORD_DEFAULT); // функция создает хеш пароля
    $query = "INSERT INTO users (name, password, image) VALUES (?, ?, '{$file['name']}')";
    $stmt = db_get_prepare_stmt($db, $query, [$name, $pas]);
    mysqli_stmt_execute($stmt);
}
// функция для записи в users если аватар не выбран
public function get_no_img() {
    $db = $this->connect();
    $this->clear();
    extract($_POST); // функция берёт ключи и делает из них переменные
    $name = htmlspecialchars($name); // функция Преобразует специальные символы в HTML-сущности
    $name = base64_encode($name); // функция шифрование имени
    $pas = password_hash($password, PASSWORD_DEFAULT); // функция создает хеш пароля
    $query = "INSERT INTO users (name, password, image) VALUES (?, ?, 'no-image.png')";
    $stmt = db_get_prepare_stmt($db, $query, [$name, $pas]);
    mysqli_stmt_execute($stmt);
}

// фукция для проверки файла
public function can_upload($file) {
    // проверка размера
    if ($file['size'] == 104000) return 'Файл слишком большой.';
    // разбиваем имя файла по точке и получаем массив
    $getMime = explode('.', $file['name']);
    // нас интересует последний элемент массива - расширение
    $mime = strtolower(end($getMime));
    // объявим массив допустимых расширений
    $types = array('jpg', 'png', 'gif', 'bmp', 'jpeg');
    // если расширение не входит в список допустимых - return
    if (!in_array($mime, $types)) return 'Недопустимый тип файла.';
    return true;
}

// фукция копирует файл на сервер
public function make_upload($file) {
    $db = $this->connect();
    copy($file['tmp_name'], 'img/' . $file['name']);
}

}
