<?php
header("Content-type: text/html; charset=utf-8");
error_reporting(-1);

require_once 'functions.php';
require_once 'controllers/MessangerController.php';

$messangerController = new MessangerController();

// показ колличество комментариев
$sum = $messangerController->get_sum();
$sum = count($sum);

$page_content = include_template('templates/index.php', [
'sum' => $sum,
'name_user' => @$name_user,
'submit_comm' => @$submit_comm,
'erroy_user' => @$erroy_user,
'end_user' => @$end_user
]);

// выводим массив $messange
   $messanges = $messangerController->get_mess();


$messanges_list = include_template('templates/blocks/messanges-list.php', [
    'messanges' => $messanges
  ]);


$layout_content = include_template('templates/layout.php', [
    'title' => 'Комментарии',
    'pagetitle' => 'Комментарии',
    'content' => $page_content,
    'messanges_list' => $messanges_list
]);

print($layout_content);
