<?php
header("Content-type: text/html; charset=utf-8");
error_reporting(-1);

require_once 'functions.php';
require_once 'modules/admin/models/Admin.php';

// создаём объект
$admin = new Admin();

// выводим массив $comments
$comments = $admin->get_comments();
// показ колличество комментариев
$sum = $admin->get_sum();
$sum = count($sum);

////////////////////////////////////////////////////////

// Удаляем комментарии
  if (!empty($_GET['delete'])) {
      $id_mess = $_GET['delete'];
      $admin->remove_mess($id_mess);
      header("Location: {$_SERVER['HTTP_REFERER']}");
      exit;
  }

////////////////////////////////////////////////////////

// записываем в переменную значение $_REQUEST
    $stok = @$_REQUEST['name'];
    // получаем массив зарегистрированных пользователей
    $users = $admin->search_user();

// запись комментарий администратора
if (!empty($_POST)) {
    // находим ключ активного элемента массива $users
    $key_user = @array_search($stok, @array_column($users, 'name'));
    // создаём массив $_POST
    $_POST['id'] = $key_user;
    $_POST['users_id'] = $users[$_POST['id']]['id'];
    $_POST['name_user'] = base64_decode($stok);
    $_POST['image_user'] = $users[$_POST['id']]['image'];
    // записываем данные в БД
    $admin->save_mess();

    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit;
}

///////////////////////////////////////////////////////

$text = include_template('modules/admin/views/adminText.php', [
'sum' => $sum,
'submit_comm' => @$submit_comm,
]);

$page_content = include_template('modules/admin/views/adminView.php', [
    'comments' => $comments
]);


$layout_content = include_template('templates/layout.php', [
    'title' => 'admin',
    'pagetitle' => 'Страница для администратора',
    'text' => $text,
    'content' => $page_content
]);

print($layout_content);
