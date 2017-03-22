<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

  public function index() {
    $this->load->model('user_model');
    $this->user_model->logout();
    redirect("/");
  }
}
