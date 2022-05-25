<div class="content">

  <p class="info">Задача № <?=$taskInfo['id'];?>: <?=$taskInfo['task_name'];?> <? if ($user::isAuth()) { ?><a href="/task<?=$taskInfo['id'];?>/edit">редактировать</a><? } ?></p>

  <div class="info result"><?=$taskInfo['task_text'];?>
    <table border="1px">
      <tbody>
        <tr>
          <td>Постановщик</td>
          <td><?=$taskInfo['user_name'];?></td>
        </tr>
        <tr>
          <td>Email</td>
          <td><?=$taskInfo['user_email'];?></td>
        </tr>
        <tr>
          <td>Время постановки</td>
          <td><?=date("d.m.Y H:i", $taskInfo['date_create']);?></td>
        </tr>
        <tr>
          <td>Срок выполнения</td>
          <td><?=date("d.m.Y H:i", $taskInfo['date_end']);?></td>
        </tr>
        <tr>
          <td>Статус</td>
          <td><?=$taskInfo['status_name'];?></td>
        </tr>
      </tbody>
    </table>
  </div>

</div>