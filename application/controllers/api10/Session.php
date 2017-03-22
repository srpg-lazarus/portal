<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Session extends CI_Controller {

  public function decrypt($toDecrypt) {
    $this->load->library('encrypt');
    $toDecrypt = urldecode($toDecrypt);
    echo $toDecrypt;
    echo $this->encrypt->decode($toDecrypt);
    echo 'hello';
  }
}
