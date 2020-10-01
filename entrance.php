<?php
header("Content-type: text/html; charset=utf-8");
error_reporting(-1);

require_once 'functions.php';
require_once 'models/Entrance.php';

// создаём объект
$entrance = new Entrance();

if (!empty($_GET)) {
    // записываем в переменную значение get
    $stok = $_GET['name'];
    // шифрование имени
    $stok = base64_encode($stok);
    // получаем массив зарегистрированных пользователей
    $users = $entrance->search_user();
   // получаем имя пользователя.
    $name = checkUser($users, $stok);
    // выбираем массив с именем зарегистрированным пользователем
    $pas = $entrance->search_pas($stok);

    // проверяем если не существует  имя то
    if (!$name) {
        $name_user_erroy = '<p class="nameErroy" style="font-size: 18px; color: red;">' .base64_decode($stok). ' чтобы комментировать, пожалуйста зарегистрируйтесь. <a href="user.php">Перейти к регистрации.</a></p>';
    } elseif (!password_verify($_GET['password'], $pas['password'])) {
        // проверяем пароль пользователя с введённым, если не совподает, то
        $password_user_erroy =  '<p class="nameErroy" style="font-size: 18px; color: red;">Не верный пароль</p>';
        $end_password = '<a href="entrance.php" class="end-user">&times;</a>';
    } elseif (base64_decode($stok) == 'admin' && password_verify($_GET['password'], $pas['password'])) {
        header("Location: admin.php?name={$stok}");
        exit;
    } else {
        header("Location: index.php?name={$stok}");
        exit;
    }
}

///////////////////////////////////////////////////////////////////////////////

$page_content = include_template('templates/entrance.php', [
    'name_user_erroy' => @$name_user_erroy,
    'password_user_erroy' => @$password_user_erroy,
    'end_password' => @$end_password
    ]);

$layout_content = include_template('templates/layout.php', [
   'title' => 'Вход',
   'pagetitle' => 'Вход',
   'content' => $page_content
]);

print($layout_content);
