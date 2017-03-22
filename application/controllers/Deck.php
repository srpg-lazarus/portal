<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Deck extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('deck_model');
    $this->load->model('unit_model');
  }

  public function index() {
    $data['decks'] = $this->deck_model->get_decks($_SESSION['user_id']);
    $this->load->view('deck/index', $data);
  }

  public function new() {
    if($this->form_validation->run() === FALSE) {
      show_404();
    }
  }

  public function edit() {
    $data['messages'] = [];

    $this->form_validation->set_rules('deck_id', 'deck_id', 'required');

    if($this->form_validation->run() === FALSE) {
      // TODO: 404 or error message
      show_404();
    }

    $deck_id = $this->input->post('deck_id');
    $deck = $this->deck_model->get_deck($deck_id, $_SESSION['user_id']);
    if(empty($deck)) {
      show_404();
    } else {
      // 更新
      $unit_id_list = $this->input->post('unit_id');
      if(!empty($unit_id_list)) {
        $this->deck_model->update_deck($deck_id, $unit_id_list);
        $deck = $this->deck_model->get_deck($deck_id, $_SESSION['user_id']);
        $data['messages'][] = '登録しました。';
      }

      $data["deck_id"] = $deck->deck_id;
      $data["indeck_unit_list"] = $deck->units;
      $data["master_unit_list"] = $this->unit_model->get_all_units();

      $this->load->view('deck/edit', $data);
    }
  }
}
