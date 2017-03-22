<?php
class TestUserSeeder extends Seeder {
  public function run() {
    $this->empty_all();
    $this->set_user();
    $this->set_attack_type();
    $this->set_move_type();
    $this->set_klass();
    $this->set_unit();
    $this->set_deck();
    $this->set_deck_unit();
  }

  protected function empty_all() {
    $tables = ['user',
      'deck_unit',
      'unit', 'deck',
      'attack_type', 'move_type',
      'klass'
    ];
    foreach($tables as $table) {
      $this->db->empty_table($table);
    }
  }

  protected function set_user() {
    $table_name = 'user';
    $this->db->empty_table($table_name);
    $this->db->query("ALTER TABLE {$table_name} auto_increment=1;");

    $datas = array(
      [
        'username' => 'test',
        'password_hash' => '$2y$10$FR2kYDBP4dFaXr5UXBnXZOQZ7Re3ESr7jFE0rIFkU4Rtk0gvFamlq',
      ],
    );
    foreach($datas as $data) {
      $now = date("Y-m-d H:i:s");
      $data['created_at'] = $now;
      $data['updated_at'] = $now;
      $this->db->insert($table_name, $data);
    }
  }

  protected function set_attack_type() {
    $table_name = 'attack_type';
    $this->db->empty_table($table_name);
    $datas = array(
      [
        'attack_type_id' => 1,
        'name' => '物理攻撃',
      ],
      [
        'attack_type_id' => 2,
        'name' => '魔法攻撃',
      ],
      [
        'attack_type_id' => 3,
        'name' => '回復',
      ],
    );
    foreach($datas as $data) {
      $this->db->insert($table_name, $data);
    }
  }

  protected function set_move_type() {
    $table_name = 'move_type';
    $this->db->empty_table($table_name);
    $datas = array(
      [
        'move_type_id' => 1,
        'name' => '歩行',
      ],
      [
        'move_type_id' => 2,
        'name' => '騎馬',
      ],
      [
        'move_type_id' => 3,
        'name' => '浮遊',
      ],
      [
        'move_type_id' => 4,
        'name' => '飛行',
      ],
    );
    foreach($datas as $data) {
      $this->db->insert($table_name, $data);
    }
  }

  protected function set_klass() {
    $table_name = 'klass';
    $this->db->empty_table($table_name);
    $datas = array(
      [
        'klass_id' => 0,
        'name' => 'なし',
        'attack_type_id' => 1,
        'move_type_id' => 1,
      ],
      [
        'klass_id' => 1,
        'name' => '剣士',
        'attack_type_id' => 1,
        'move_type_id' => 1,
      ],
      [
        'klass_id' => 2,
        'name' => '魔法攻撃',
        'attack_type_id' => 2,
        'move_type_id' => 3,
      ],
      [
        'klass_id' => 3,
        'name' => '回復',
        'attack_type_id' => 3,
        'move_type_id' => 1,
      ],
      [
        'klass_id' => 4,
        'name' => '騎兵',
        'attack_type_id' => 1,
        'move_type_id' => 2,
      ],
      [
        'klass_id' => 5,
        'name' => 'バードマン',
        'attack_type_id' => 1,
        'move_type_id' => 4,
      ],
    );
    foreach($datas as $data) {
      $this->db->insert($table_name, $data);
    }
  }

  protected function set_unit() {
    $table_name = 'unit';
    $this->db->empty_table($table_name);

    $datas = array(
      [
        'unit_id' => 0,
        'klass_id' => 0,
        'name' => 'なし',
        'hp' => 1,
        'power' => 1,
        'defence' => 1,
        'faith' => 1,
        'skill' => 1,
        'luck' => 1,
        'hit' => 1,
        'min_range' => 1,
        'max_range' => 1,
        'cost' => 0,
      ],
      [
        'unit_id' => 1,
        'klass_id' => 1,
        'name' => '一般兵',
        'hp' => 20,
        'power' => 1,
        'defence' => 1,
        'faith' => 1,
        'skill' => 1,
        'luck' => 1,
        'hit' => 1,
        'min_range' => 1,
        'max_range' => 1,
        'cost' => 1,
      ],
      [
        'unit_id' => 2,
        'klass_id' => 1,
        'name' => 'シールドマン',
        'hp' => 30,
        'power' => 1,
        'defence' => 20,
        'faith' => 1,
        'skill' => 1,
        'luck' => 1,
        'hit' => 1,
        'min_range' => 1,
        'max_range' => 1,
        'cost' => 2,
      ],
      [
        'unit_id' => 3,
        'klass_id' => 4,
        'name' => 'ホースマン',
        'hp' => 24,
        'power' => 4,
        'defence' => 3,
        'faith' => 1,
        'skill' => 5,
        'luck' => 1,
        'hit' => 1,
        'min_range' => 1,
        'max_range' => 1,
        'cost' => 3,
      ],
      [
        'unit_id' => 4,
        'klass_id' => 3,
        'name' => 'メディック',
        'hp' => 14,
        'power' => 4,
        'defence' => 3,
        'faith' => 5,
        'skill' => 5,
        'luck' => 1,
        'hit' => 1,
        'min_range' => 1,
        'max_range' => 1,
        'cost' => 4,
      ],
      [
        'unit_id' => 5,
        'klass_id' => 1,
        'name' => 'シーフ',
        'hp' => 10,
        'power' => 1,
        'defence' => 3,
        'faith' => 5,
        'skill' => 15,
        'luck' => 1,
        'hit' => 1,
        'min_range' => 1,
        'max_range' => 1,
        'cost' => 5,
      ],
    );
    foreach($datas as $data) {
      $this->db->insert($table_name, $data);
    }
  }

  protected function set_deck() {
    $table_name = 'deck';
    $this->db->empty_table($table_name);

    $datas = array(
      [
        'user_id' => 1,
        'deck_id' => 1,
      ],
      [
        'user_id' => 1,
        'deck_id' => 2,
      ],
      [
        'user_id' => 1,
        'deck_id' => 3,
      ],
      /*
      [
        'user_id' => 1,
        'deck_id' => 4,
      ],
      [
        'user_id' => 1,
        'deck_id' => 5,
      ],
       */
    );
    foreach($datas as $data) {
      $this->db->insert($table_name, $data);
    }
  }

  protected function set_deck_unit() {
    $table_name = 'deck_unit';
    $this->db->empty_table($table_name);

    $datas = array(
      [
        'user_id' => 1,
        'deck_id' => 1,
        'order_in_deck' => 1,
        'unit_id' => 1,
      ],
      [
        'user_id' => 1,
        'deck_id' => 1,
        'order_in_deck' => 2,
        'unit_id' => 2,
      ],
      [
        'user_id' => 1,
        'deck_id' => 1,
        'order_in_deck' => 3,
        'unit_id' => 3,
      ],
      [
        'user_id' => 1,
        'deck_id' => 1,
        'order_in_deck' => 4,
        'unit_id' => 4,
      ],
      [
        'user_id' => 1,
        'deck_id' => 1,
        'order_in_deck' => 5,
        'unit_id' => 5,
      ],
      [
        'user_id' => 1,
        'deck_id' => 2,
        'order_in_deck' => 1,
        'unit_id' => 1,
      ],
      [
        'user_id' => 1,
        'deck_id' => 2,
        'order_in_deck' => 2,
        'unit_id' => 2,
      ],
      [
        'user_id' => 1,
        'deck_id' => 2,
        'order_in_deck' => 3,
        'unit_id' => 3,
      ],
      [
        'user_id' => 1,
        'deck_id' => 2,
        'order_in_deck' => 4,
        'unit_id' => 4,
      ],
      [
        'user_id' => 1,
        'deck_id' => 2,
        'order_in_deck' => 5,
        'unit_id' => 5,
      ],
      [
        'user_id' => 1,
        'deck_id' => 3,
        'order_in_deck' => 1,
        'unit_id' => 1,
      ],
      [
        'user_id' => 1,
        'deck_id' => 3,
        'order_in_deck' => 2,
        'unit_id' => 2,
      ],
      [
        'user_id' => 1,
        'deck_id' => 3,
        'order_in_deck' => 3,
        'unit_id' => 3,
      ],
      [
        'user_id' => 1,
        'deck_id' => 3,
        'order_in_deck' => 4,
        'unit_id' => 4,
      ],
      [
        'user_id' => 1,
        'deck_id' => 3,
        'order_in_deck' => 5,
        'unit_id' => 5,
      ],

    );
    foreach($datas as $data) {
      $this->db->insert($table_name, $data);
    }
  }

}
