<section class="container unit-index">
<h1>Unit/Index</h1>
<section>
<h2>ユニット一覧</h2>
  <table>
    <tr>
      <th>Name</th>
      <th>HP</th>
      <th>力</th>
      <th>防</th>
      <th>コスト</th>
    </tr>
<?php foreach($units as $unit): ?>
    <tr class="unit_<?=$unit->unit_id?>">
      <td class="name"><?=$unit->name?></td>
      <td class="hp"><?=$unit->hp?></td>
      <td class="power"><?=$unit->power?></td>
      <td class="defence"><?=$unit->defence?></td>
      <td class="cost"><?=$unit->cost?></td>
    </tr>
<?php endforeach; ?>
  </table>
</section>
</section>
