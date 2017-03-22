<section class="container">
<h1>Deck</h1>

<?php foreach($decks as $deck) : ?>
  <div data-deck_id=<?=$deck->deck_id?>>
    <?php echo form_open('deck/edit'); ?>
    <h3>
      <div class="horizontal">デッキ<?php echo $deck->deck_id; ?></div>
      <div class="horizontal">
        <?php echo form_submit('edit', '編集'); ?>
      </div>
    </h3>
<?php $this->load->view('deck/_unit_list', ["id"=>"", "unit_list"=>$deck->units]); ?>
    <ul>
    <?php echo form_hidden('deck_id', $deck->deck_id); ?>
    <?php echo form_close(); ?>
  </div>
<?php endforeach; ?>
</section>
