<ul id="<?=$id?>" class="unit-list <?=(isset($add_class)?$add_class:'')?>">
  <?php foreach($unit_list as $unit) :?>
    <?php $this->load->view('deck/_unit', ['unit' => $unit, 'add_form_unit_id' => $add_form_unit_id ?? false]); ?>
  <?php endforeach; ?>
</ul>
