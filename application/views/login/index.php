<section class="container">
<h1>Login</h1>

<?php echo validation_errors(); ?>

<?php echo form_open('login'); ?>
  <ul>
    <li>
      <?php echo form_label("username"); ?>
      <?php echo form_input("username"); ?>
    </li>
    <li>
      <?php echo form_label("password"); ?>
      <?php echo form_password("password"); ?>
    </li>
  <ul>
  <?php echo form_submit("submit", "login"); ?>
<?php echo form_close(); ?>
</section>
