<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unit extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('unit_model');
  }

  public function index() {
    $data['units'] = array_filter($this->unit_model->get_all_units(), function($unit) {
      return $unit->unit_id != 0;
    });

    $this->load->view('unit/index', $data);
  }
}
