<div class="navbar">
<nav aria-label="breadcrumb">
      <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="index.php">Комментарии</a></li>
         <li class="breadcrumb-item active" aria-current="page">Регистрация</li>
         <li class="breadcrumb-item"><a href="entrance.php">Вход</a></li>
      </ol>
</nav>
</div>
<div class="wrapper-form animated bounce">
<form action="" enctype="multipart/form-data" method="post" class="needs-validation" novalidate>
   <div class="form-row">
      <div class="col-md-6">
         <input type="text" class="form-control" id="validationCustom01" name="name" placeholder="Ваше имя" required>
         <div class="valid-feedback">
            Имя указано!
         </div>
         <div class="invalid-feedback">
            Вы не указали ваше имя.
         </div>
         <div class="form-item" style="margin-top: 10px;"><span style="color: red;"><?= $name_user_erroy; ?><?= $end_user; ?></span></div>
      </div>
   </div>
   <div class="form-row" style="margin-top: 15px;">
      <div class="col-md-6">
      <input type="password" class="form-control" id="validationCustom02" name="password" placeholder="Пароль" required>
      <div class="valid-feedback">
         Пароль не указан!
      </div>
      <div class="invalid-feedback">
         Вы не указали ваш пароль!
      </div>
      </div>
    </div>
   <div class="form-row" style="margin-top: 15px;">
      <div class="col-md-6 mb-3">
         <ul class="form-file">
            <li class="form-file--item"><label for="inputFile">Ваш аватар </label></li>
            <li class="form-file--item"><input type="file" id="inputFile" name="file"></li>
            <li class="form-file--item" style="margin-top: 10px;"><span style="color: red;"><?= @$erroy; ?><?= @$end; ?></span></li>
            <li class="form-file--item" style="margin-top: 10px;"><?= $image_no; ?><?= @$end_image_no; ?></li>
         </ul>
      </div>
   </div>
   <button type="submit" class="btn btn-success">Зарегистрироваться</button>
</form>
</div>
