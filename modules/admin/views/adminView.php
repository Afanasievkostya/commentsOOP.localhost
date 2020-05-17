<!--Блок показа комментарий-->
<div class="title title-mess">
   <h3>Удаление комментарий</h3>
</div>
<table border="1">
   <?php if (isset($comments)): ?>
   <?php foreach ($comments as $comment): ?>
   <tr align="center">
      <td>
         <?= $comment['id']; ?>
      </td>
      <td>
         <img style="width: 50px; height: auto" src="img/<?= htmlspecialchars($comment['image_user']); ?>" alt="">
      </td>
      <td class="text-weight"><?= nl2br(htmlspecialchars($comment['name_user'])); ?></td>
      <td class="text-weight data"><?= $comment['data']; ?></td>
      <td class="card-body">
         <?= nl2br(htmlspecialchars($comment['comment'])); ?>
      </td>
      <td>
         <?php
            $key_mess = $comment['id'];
               echo '<a href="?delete='.$key_mess.'"><span class="remove" style="color: #666; font-size: 20px;"><i class="fas fa-trash-alt"></i></span></a>';
            ?>
      </td>
   </tr>
   <?php endforeach; ?>
   <?php endif; ?>
</table>