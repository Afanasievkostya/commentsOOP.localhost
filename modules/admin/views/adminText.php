<nav aria-label="breadcrumb">
      <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="index.php">Комментарии</a></li>
         <li class="breadcrumb-item"><a href="user.php">Регистрация</a></li>
         <li class="breadcrumb-item"><a href="entrance.php">Вход</a></li>
         <li class="breadcrumb-item active" aria-current="page">Admin</li>
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
    <button type="submit" class="btn btn-success">Отправить</button>
   </fieldset>
</form>
