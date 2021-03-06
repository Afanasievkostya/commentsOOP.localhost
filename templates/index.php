<?php
   header("Content-type: text/html; charset=utf-8");
   error_reporting(-1);
   
   require_once 'functions.php';
   ?>
<div class="navbar">
   <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
         <li class="breadcrumb-item active" aria-current="page">Комментарии</li>
         <li class="breadcrumb-item"><a href="user.php">Регистрация</a></li>
         <li class="breadcrumb-item"><a href="entrance.php">Вход</a></li>
      </ol>
   </nav>
</div>
<!--Блок формы комментарий-->
<form  action="" method="post" class="needs-validation" novalidate id="submit1">
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
<div class="displayComments">
   <div class="title title-mess">
      <h3>Последние 20 комментарий</h3>
   </div>
   <!--Блок показа комментарий и ответов-->
   <div class="wrapper">
      <?php if (isset($messanges)): ?>
      <?php foreach ($messanges as $messange): ?>
      <div class="card-wrapper animated bounce">
         <div class="card-image">
            <img src="img/<?= htmlspecialchars($messange['image_user']); ?>" alt="">
         </div>
         <div class="card message">
            <!--Блок показа комментарий-->
            <div class="messamgesDisplay">
               <div class="card-header text-muted">
                  <div class="card-header--left">
                     <p class="text-weight"><?= nl2br(htmlspecialchars($messange['name_user'])); ?></p>
                     <p class="text-weight data"><?= $messange['data']; ?></p>
                  </div>
               </div>
               <div class="card-body page-comment">
                  <?= nl2br(htmlspecialchars($messange['comment'])); ?>
               </div>
            </div>
            <!-- *************answer************** -->
            <!--блок отправки ответов-->
            <div class="answer card-header--left">
               <p>
                  <a class="answer-on" data-toggle="collapse" href="#multiCollapseExample<?= $messange['id']; ?>" role="button" aria-expanded="false" aria-controls="multiCollapseExample"><?= $ans; ?></a>
               </p>
               <div class="collapse multi-collapse" id="multiCollapseExample<?= $messange['id']; ?>">
                  <div class="card card-body">
                     <form  action="" method="post" class="needs-validation" novalidate>
                        <?php
                           $value = isset($messange['id']) ? $messange['id'] : '';
                           ?>
                        <div class="form-row">
                           <div class="col-md-10 col-lg-6">
                              <textarea class="form-control" id="validationCustom03" name="comment" rows="1" required><?= nl2br(htmlspecialchars($messange['name_user'])); ?>, </textarea>
                              <input type="hidden" name="answ_id" value="<?= $value; ?>">
                              <div class="valid-feedback">
                                 Текст написан!
                              </div>
                              <div class="invalid-feedback">
                                 Вы не написали текст.
                              </div>
                           </div>
                           <div class="col-md-1">
                              <button class="answer-submit" type="submit" name="submit-answer" style="margin: 5px;"><span><i class="fas fa-sign-out-alt"></i></span></button>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
            <!-- *************answers************** -->
            <!--блок показа ответов-->
            <div class="answers card-header--left">
               <?php $col = 0; ?>
               <div class="collapse multi-collapse" id="multiCollapseExample<?= $messange['id']; ?>n">
                  <div class="card card-body card-body-answers">
                     <div class="answers-wrapper">
                        <?php $col = 0; ?>
                        <?php if (isset($answers)): ?>
                        <?php foreach ($answers as $answer): ?>
                        <?php if ($answer['messanges_id'] == $messange['id']): ?>
                        <div class="answ">
                           <div class="card-image answers-image">
                              <img src='img/<?= htmlspecialchars($answer['image_user']); ?>' alt="">
                           </div>
                           <div class="card-header text-muted answers-header">
                              <div class="card-header--left">
                                 <p class="text-weight"><?= nl2br(htmlspecialchars($answer['name_user'])); ?></p>
                                 <p class="text-weight data"><?= $answer['data']; ?></p>
                              </div>
                           </div>
                           <div class="card-body answers-comment">
                              <?= nl2br(htmlspecialchars($answer['comment'])); ?>
                              <hr>
                           </div>
                        </div>
                        <?php $col++; ?>
                        <?php endif; ?>
                        <?php endforeach; ?>
                        <?php endif; ?>
                     </div>
                  </div>
               </div>
               <p>
                  <a class="answers-on" data-toggle="collapse" href="#multiCollapseExample<?= $messange['id']; ?>n" role="button" aria-expanded="false" aria-controls="multiCollapseExample"><span><i class="fas fa-level-up-alt" style="transform: rotate(90deg);"></i></span></i><?= $col . " " .  conjugation_form($col, 'ответ', 'ответа', 'ответов'); ?>
                  </a>
               </p>
            </div>
         </div>
      </div>
      <?php endforeach; ?>
      <?php endif; ?>
   </div>
</div>