<?php
header("Content-type: text/html; charset=utf-8");
error_reporting(-1);

require_once 'functions.php';

require_once 'models/Messanger.php';
require_once 'models/Answer.php';

// создаём объекты
$messanger = new Messanger();
$answer = new Answer();

// записываем в переменную значение $_REQUEST
    $stok = @$_REQUEST['name'];
    // получаем массив зарегистрированных пользователей
    $users = $messanger->search_user();
    // получаем имя пользователя.
    $name = checkUser($users, $stok);
    // выводим массив $messanges
    $messanges = $messanger->get_mess();
    // показ колличество комментариев
    $sum = $messanger->get_sum();
    $sum = count($sum);

  /////////////////////////////////////////////////////////////////////

    // выводим массив $answers
    $answers = $answer->get_answ();


   // показ колличества ответов
    $sum_answer = count($answers);

    //////////////////////////////////////////////////////////////////////

    if (!empty($_GET)) {
        if (!$name) {
            $erroy_user = '<p style="font-size: 18px; color: red;">Не санкционированный вход. Отказ в допуске!</p>';
            $end_user = '<a href="user.php" class="end-user">&times;</a>';
        } else {
            $name_user = '<p style="color: green;">Добро пожаловать: <span style="font-size: 18px; font-weight: bold;">'.base64_decode($stok).'</span></p>';
            $submit_comm = '<button type="submit" name="submit-comment" class="btn btn-success">Отправить</button>';
            $ans = 'ответить';
        }
    }

    /////////////////////////////////////////////////////////////////////////


    if (!empty($_POST)) {

      if (isset($_POST['submit-comment'])) {
        // находим ключ активного элемента массива $users
        $key_user = @array_search($stok, @array_column($users, 'name'));
        $_POST['id'] = $key_user;
        $_POST['users_id'] = $users[$_POST['id']]['id'];
        $_POST['name_user'] = base64_decode($stok);
        $_POST['image_user'] = $users[$_POST['id']]['image'];
        
        // записываем данные в БД
        $messanger->save_mess();
      }
      elseif (isset($_POST['submit-answer'])) {
        // находим ключ активного элемента массива $users
        $key_user = @array_search($stok, @array_column($users, 'name'));
           $_POST['id'] = $key_user;
           $_POST['user_id'] = $users[$_POST['id']]['id'];
           $_POST['messanges_id'] = $_POST['answ_id'];
           $_POST['name_user'] = base64_decode($stok);
           $_POST['image_user'] = $users[$_POST['id']]['image'];

           // записываем данные в БД
           $answer->save_answ();
      }

      header("Location: index.php?name={$stok}");
      exit;

      }


    ///////////////////////////////////////////////////////////////////////////


$page_content = include_template('templates/index.php', [
'sum' => $sum,
'name_user' => @$name_user,
'submit_comm' => @$submit_comm,
'erroy_user' => @$erroy_user,
'end_user' => @$end_use
]);


$messanges_list = include_template('templates/blocks/messanges-list.php', [
    'messanges' => $messanges,
    'answers' => $answers,
    'ans' => @$ans,
    'sum_answer' => $sum_answer
  ]);


$layout_content = include_template('templates/layout.php', [
    'title' => 'Комментарии',
    'pagetitle' => 'Комментарии',
    'content' => $page_content,
    'messanges_list' => $messanges_list
]);

print($layout_content);
