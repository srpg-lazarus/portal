<?php

class Unit_model extends CI_Model {

  /**
   * unit_idが指定されたユニットを取得
   */
  public function get_unit($unit_id, $is_masked=true) {
    $query = $this->db->select()->from('unit')
      ->where(array('unit_id' => $unit_id))
      ->limit(1)->get();
    $result = $query->result();
    if($is_masked) {
      $result = $this->_maskToShow($result);
    }
    return (empty($result)) ? null : $result[0];
  }

  /**
   * デッキ内のユニットを取得
   */
  public function get_units($deck, $is_masked=true) {
    $query = $this->db->select()->from('unit')
      ->join('deck_unit', 'deck_unit.unit_id = unit.unit_id')
      ->where('deck_unit.deck_id', $deck->deck_id)
      ->order_by('deck_unit.order_in_deck', 'ASC')
      ->get();
    $result = $query->result();
    if($is_masked) {
      $result = $this->_maskToShow($result);
    }
    return $result;
  }

  /**
   * すべてのユニットを取得
   */
  public function get_all_units($is_masked=true) {
    $query = $this->db->select()->from('unit')->get();
    $result = $query->result();
    if($is_masked) {
      $result = $this->_maskToShow($result);
    }
    return $result;
  }

  /**
   * 表示用にunit_0の情報をマスクする
   */
  private function _maskToShow($units) {
    foreach($units as $unit) {
      if($unit->unit_id == 0) {
        $unit->hp = '-';
        $unit->power = '-';
        $unit->defence = '-';
        $unit->cost = '-';
      }
    }
    return $units;
  }
}
