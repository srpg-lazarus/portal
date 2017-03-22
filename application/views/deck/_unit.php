<?php $this->load->helper('dataattr'); ?>

<li class="unit" draggable="true">
  <div class="unit-inner unit_<?=$unit->unit_id;?>" <?php echo dataAttr((array)$unit, ['unit_id', 'name', 'hp', 'power', 'defence', 'cost']);?>>
<?php if($add_form_unit_id): ?>
    <?=form_hidden('unit_id[]', $unit->unit_id); ?>
<?php endif; ?>
    <div class="remove" style="display:none">x</div>
    <?=$unit->unit_id?>:<?=$unit->name?>(<?=$unit->cost?>)
  </div>
</li>
