<!--Блок показа комментарий-->
<div class="title title-mess">
   <h3>Последние 20 комментарий</h3>
</div>
<div class="wrapper">
   <?php if (isset($messanges)): ?>
   <?php foreach ($messanges as $messange): ?>
   <div class="card-wrapper animated bounce">
      <div class="card-image">
         <img src="img/<?= htmlspecialchars($messange['image_user']); ?>" alt="">
      </div>
      <div class="card message">
         <div class="card-header text-muted">
           <div class="card-header--left">
            <p class="text-weight"><?= nl2br(htmlspecialchars($messange['name_user'])); ?></p>
            <p class="text-weight data"><?= $messange['data']; ?></p>
           </div>
            <div class="text-remove">
              <?php
                $key_mess = $messange['id'];
                if (base64_decode(@$_GET['name']) == 'admin') {
                   echo '<a href="?delete='.$key_mess.'">Удалить</a>';
                }
             ?>
            </div>
         </div>
         <div class="card-body">
            <?= nl2br(htmlspecialchars($messange['comment'])); ?>
         </div>
      </div>
   </div>
   <?php endforeach; ?>
   <?php endif; ?>
</div>
