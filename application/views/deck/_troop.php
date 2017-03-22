<li class="troop" draggable="true">
  <div class="troop-inner troop_<?=$troop->troop_id;?>" data-name="<?=$troop->name?>">
<?php if($add_form_troop_id): ?>
    <?=form_hidden('troop_id[]', $troop->troop_id); ?>
<?php endif; ?>
    <div class="remove" style="display:none">x</div>
      <?=$troop->troop_id?>:<?=$troop->name?>(<?=$troop->cost?>)
    <div class="units">
    <?php $i = 1; ?>
    <?php foreach($troop->units as $unit) :?>
      <?php $this->load->view('deck/_unit', ['unit' => $unit]); ?>
    <?php endforeach; ?>
    </div>
  </div>
</li>
