<?php

// Класс сущности страницы входа для комментаий.
require_once 'Database.php';
require_once 'mysql_helper.php';

class Entrance extends Database
{

  // фукция выбирает все значения из users
  public function search_user() {
      $db = $this->connect();
      $query = "select * from users";
      $res = mysqli_query($db, $query);
      return mysqli_fetch_all($res, MYSQLI_ASSOC);
  }

  // фукция выбирает значения password из таблицы users по имени
  public function search_pas($name) {
      $db = $this->connect();
      $query = 'select * from users WHERE name = ?';
      $stmt = db_get_prepare_stmt($db, $query, [$name]);
      mysqli_stmt_execute($stmt);
      $res = mysqli_stmt_get_result($stmt);
    return mysqli_fetch_assoc($res);
  }

}
