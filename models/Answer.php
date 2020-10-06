<?php

// Класс сущности главной страницы.
require_once 'Database.php';



class Answer extends Database
{
  // метод для экранирования апострофов
    public function clear()
    {
        $db = $this->connect();
        foreach ($_POST as $key => $value) {
            $_POST[$key] = mysqli_real_escape_string($db, $value);
        }
    }

    // метод для записи данных в answers
    public function save_answ()
    {
        $db = $this->connect();
        $this->clear();
        extract($_POST); // функция берёт ключи и делает из них переменные
        $_monthsList = [".01." => "января", ".02." => "февраля", ".03." => "марта", ".04." => "апреля", ".05." => "мая", ".06." => "июня", ".07." => "июля", ".08." => "августа", ".09." => "сентября", ".10." => "октября", ".11." => "ноября", ".12." => "декабря"];
        $data = date("d.m.Y");
        $_mD = date(".m.");
        $data = str_replace($_mD, " " . $_monthsList[$_mD] . " ", $data);
        $comment = nl2br(htmlspecialchars($comment)); // Вставляет HTML-код разрыва строки и Преобразует специальные символы в HTML-сущности
        $query = "INSERT INTO answers (user_id, messanges_id, name_user, image_user, comment, data) VALUES ('$user_id', '$messanges_id', '$name_user', '$image_user', '$comment', '$data')";
        mysqli_query($db, $query);
    }

    // метод выбора из таблицы answers все данные
    public function get_answ()
    {
        $db = $this->connect();
        $query = "SELECT * FROM answers ORDER BY id DESC";
        $res = mysqli_query($db, $query);

        return mysqli_fetch_all($res, MYSQLI_ASSOC);
    }
}
