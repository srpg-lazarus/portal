<ul id="<?=$id?>" class="troop-list <?=(isset($add_class)?$add_class:'')?>">
  <?php foreach($troop_list as $troop) :?>
    <?php $this->load->view('deck/_troop', ['troop' => $troop, 'add_form_troop_id' => $add_form_troop_id ?? false]); ?>
  <?php endforeach; ?>
</ul>
