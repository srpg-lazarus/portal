<?php

class Deck_model extends CI_Model {

  const MAX_COST_IN_DECK = 20;

  public function __construct() {
    parent::__construct();
    $this->load->model('unit_model');
  }

  /**
   * 指定されたdeck_idとuser_idのdeckを取得
   */
  public function get_deck($deck_id, $user_id) {
    $query = $this->db->select()->from('deck')
      ->where(array('deck_id' => $deck_id, 'user_id' => $user_id))
      ->limit(1)->get();
    $result = $query->result();
    $this->_set_units($result);
    return (empty($result)) ? null : $result[0];
  }

  /**
   * userのdeckをまとめて取得
   */
  public function get_decks($user_id) {
    $query = $this->db->select()->where('user_id', $user_id)->get('deck');
    $result = $query->result();
    $this->_set_units($result);
    return $result;
  }

  private function _set_units($decks) {
    foreach($decks as $deck) {
      $deck->units = $this->unit_model->get_units($deck);
    }
  }

  public function update_deck($deck_id, $unit_id_list) {
    $user_id = $_SESSION['user_id'];
    $deck = $this->get_deck($deck_id, $user_id);
    $update_batch_arr = [];
    foreach($deck->units as $unit) {
      $new_unit_id = $unit_id_list[$unit->order_in_deck - 1];
      if($unit->unit_id != $new_unit_id) {
        $this->db->set('unit_id', $new_unit_id);
        $this->db->where('deck_id', $deck_id);
        $this->db->where('user_id', $user_id);
        $this->db->where('order_in_deck', $unit->order_in_deck);
        $this->db->limit(1);
        $this->db->update('deck_unit');
      }
    }
  }
}
