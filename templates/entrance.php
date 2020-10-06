<div class="navbar">
<nav aria-label="breadcrumb">
      <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="index.php">Комментарии</a></li>
         <li class="breadcrumb-item"><a href="user.php">Регистрация</a></li>
         <li class="breadcrumb-item active" aria-current="page">Вход</li>
      </ol>
</nav>
</div>
<div class="wrapper-form animated bounce">
<form action="" method="get" class="needs-validation" novalidate>
   <div class="form-row">
     <?php $value = isset($stok) ? $stok : ''; ?>
      <div class="col-md-4 mb-3">
         <input type="text" class="form-control" id="validationCustom01" name="name" placeholder="Ваше имя" value="<?= @base64_decode($stok); ?>" required>
         <div class="valid-feedback">
            Имя указано!
         </div>
         <div class="invalid-feedback">
            Вы не указали ваше имя.
         </div>
      </div>
      <?= $name_user_erroy; ?>
   </div>
   <div class="form-row" style="margin-top: 15px;">
      <div class="col-md-4 mb-3">
      <input type="password" class="form-control" id="validationCustom02" name="password" placeholder="Пароль" required>
      <div class="valid-feedback">
         Пароль указан!
      </div>
      <div class="invalid-feedback">
         Вы не указали ваш пароль!
      </div>
      </div>
    </div>
    <div class="form-item" style="margin-top: 10px;"><span style="color: red;"><?= $password_user_erroy; ?><?= $end_password; ?></span></div>
   <button type="submit" class="btn btn-success">войти</button>
</form>
</div>
