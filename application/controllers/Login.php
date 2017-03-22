<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('user_model');
  }

  public function index() {
    $this->form_validation->set_rules('username', 'userame', 'required');
    $this->form_validation->set_rules('password', 'password', 'required');

    if($this->form_validation->run() === FALSE) {
      $this->load->view('login/index');
    } else {
      try {
        $this->user_model->login($this->input->post('username'), $this->input->post('password'));
        redirect('/');
      } catch(Exeption $e) {
        $this->load->view('login/index');
      }
    }
  }
}
