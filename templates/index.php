<nav aria-label="breadcrumb">
      <ol class="breadcrumb">
         <li class="breadcrumb-item active" aria-current="page">Комментарии</li>
         <li class="breadcrumb-item"><a href="user.php">Регистрация</a></li>
         <li class="breadcrumb-item"><a href="entrance.php">Вход</a></li>
      </ol>
</nav>
<!--Блок формы комментарий-->
<form  action="" method="post" class="needs-validation" novalidate>
   <fieldset class="commentForm">
      <legend>
         <p class="title-sum">Комментарии</p>
         <p class="sum"><?= $sum; ?></p>
      </legend>
      <div class="form-row">
         <div class="col-md-6 mb-3">
            <textarea class="form-control" id="validationCustom02" name="comment" rows="2" placeholder="Ваш комментарий" required></textarea>
            <div class="valid-feedback">
               Текст написан!
            </div>
            <div class="invalid-feedback">
               Вы не написали текст.
            </div>
         </div>
      </div>
      <div class="form-row">
         <div class="col-md-6 mb-3">
            <p>Чтобы комментировать: <a href="user.php">Зарегистрироваться</a> или <a href="entrance.php">
               Войти
               </a>
            </p>
         </div>
      </div>
      <div class="form-item"><span style="color: red;"><?= $erroy_user; ?><?= $end_user; ?></span></div>
      <?= $name_user; ?>
      <?= $submit_comm; ?>
   </fieldset>
</form>
