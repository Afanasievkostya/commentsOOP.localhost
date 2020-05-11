<?php
header("Content-type: text/html; charset=utf-8");
error_reporting(-1);

require_once 'functions.php';
require_once 'models/User.php';

$user = new User();

$page_content = include_template('templates/user.php', [
    'name_user_erroy' => @$name_user_erroy,
    'end_user' => @$end_user,
    'image_no' => @$image_no,
    '$end_image_no' => @$end_image_no
	]);

$layout_content = include_template('templates/layout.php', [
    'title' => 'Регистрация',
    'pagetitle' => 'Регистрация',
    'content' => $page_content
]);

print($layout_content);
