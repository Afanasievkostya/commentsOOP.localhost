<?php
// Класс отвечающий за соединения с базой данных.
class Database
{
    public $db;

    public function connect()
    {
        //header("Content-type: text/html; charset=utf-8");
        $this->db = mysqli_connect('localhost', 'root', '', 'gb') or die('Ошибка соединения с БД');

        mysqli_set_charset($this->db, "utf8") or die('Не установлена кодировка');

        return $this->db;
    }
}
