<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signin extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('user_model');
  }

  public function index() {
    $this->load->helper('form');
    $this->load->library('form_validation');

    $this->form_validation->set_rules('username', 'username', 'required');
    $this->form_validation->set_rules('username', 'username', 'is_unique[user.username]');
    $this->form_validation->set_rules('password', 'password', 'required');

    if($this->form_validation->run() === FALSE) {
      $this->load->view('signin/index');
    } else {
      $username = $this->input->post('username');
      $password = $this->input->post('password');
      $result = $this->user_model->create($username, $password);
      if(!empty($result)) {
        $data['name'] = $username;
        $this->load->view('signin/success', $data);
      } else {
        // TODO:登録失敗エラー表示
        $this->load->view('signin/index');
      }
    }
  }
}
