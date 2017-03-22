<section class="container">
<h1>Signin</h1>

<?php echo validation_errors(); ?>

<?php echo form_open('signin'); ?>
  <ul>
    <li>
      <?php echo form_label("username"); ?>
      <?php echo form_input("username", $this->input->post("username")); ?>
    </li>
    <li>
      <?php echo form_label("password"); ?>
      <?php echo form_password("password"); ?>
    </li>
  <ul>
  <?php echo form_submit("submit", "signin"); ?>
<?php echo form_close(); ?>
</section>
