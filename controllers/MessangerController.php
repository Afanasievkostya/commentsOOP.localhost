<?php

// Класс сущности главной страницы.
require_once 'Database.php';

class MessangerController extends Database
{
    public $messanges;
    public $sum;

    // метод выбора кол-во комментариев
    public function get_sum()
    {
        $db = $this->connect();

        $query = "SELECT * FROM messanges ORDER BY id DESC";
        $res = mysqli_query($db, $query);
        return mysqli_fetch_all($res, MYSQLI_ASSOC);
    }

    // метод выбора из таблицы messangers 20 последних комментариев
    public function get_mess()
    {
        $db = $this->connect();

        $query = "SELECT * FROM messanges ORDER BY id DESC LIMIT 20";
        $res = mysqli_query($db, $query);

        return mysqli_fetch_all($res, MYSQLI_ASSOC);
    }
}
