<section class="container deck-edit">
<h1><a href="/deck/"/>Deck</a>/edit</h1>
<?php if($messages): ?>
<section class="container">
  <ul class="messages">
<?php foreach($messages as $message) :?>
    <li class="message"><?=$message?></li>
<?php endforeach; ?>
  </ul>
<?php endif; ?>
<p>ドラッグしてユニットをデッキに入れ、登録をクリック</p>

<section class="horizontal">
  <h2>units in deck <?=$deck_id?></h2>
<?=form_open(); ?>
  <?php $this->load->view('deck/_unit_list', ['id' => 'indeck-unit-list', 'unit_list' => $indeck_unit_list, 'add_form_unit_id' => true]); ?>
  <?=form_hidden('deck_id', $deck_id); ?>
  <?=form_submit('submit', '登録'); ?>
  <a href="/deck" class="button button-outline">戻る</a>
<?=form_close(); ?>
</section>

<div class="horizontal left-arrow" style=""></div>

<section class="horizontal">
  <h2>selectable units</h2>
  <?php $this->load->view('deck/_unit_list', ['id'=>'master-unit-list', 'unit_list' => $master_unit_list, "add_class" => ' selectable-unit-list', 'add_form_unit_id' => true]); ?>
</section>

<section id="unit-detail" class="horizontal">
  <h2>unit detail</h2>
  <div class="unit-detail-status">
    <div class="unit-name">ユニット名:<span class="name"></span></div>
    <table>
    <tr>
      <th>HP</th>
      <th>力</th>
      <th>防</th>
      <th>コスト</th>
    </tr>
    <tr>
      <td class="hp"></td>
      <td class="power"></td>
      <td class="defence"></td>
      <td class="cost"></td>
    </table>
  </div>
</section>

<script src="/static/js/deck.js"></script>
</seciton>
