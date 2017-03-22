<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Test / <?php echo $_class; ?></title>
  <?php echo link_tag("css/portal/header.css?{$this->config->item('static_suffix')}"); ?>
  <?php echo link_tag("css/portal/common.css?{$this->config->item('static_suffix')}"); ?>
  <?php echo link_tag("css/portal/deck.css?{$this->config->item('static_suffix')}"); ?>
  <?php echo link_tag("css/portal/footer.css?{$this->config->item('static_suffix')}"); ?>
  <?php echo link_tag('//fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic'); ?>
  <?php echo link_tag('//cdn.rawgit.com/necolas/normalize.css/master/normalize.css'); ?>
  <?php echo link_tag('//cdn.rawgit.com/milligram/milligram/master/dist/milligram.min.css'); ?>
</head>
<body>

<nav class="navigation">
  <section class="container">
    <a href="/" class="navigation-title">
      <img class="img" src="/static/img/header/logo.jpg">
    </a>
    <ul class="navigation-list float-right">
<?php if(!empty($_SESSION['username'])) :?>
      <li class="navigation-item"><?php echo $_SESSION['username']; ?></li>
      <li class="navigation-item"><a href="/logout">[logout]</a></li>
<?php else : ?>
      <li class="navigation-item"><a href="/login">[login]</a></li>
      <li class="navagation-item"><a href="/signin">[signin]</a></li>
<?php endif;?>
    </ul>
  </section>
</nav>

<main class="wrapper">
