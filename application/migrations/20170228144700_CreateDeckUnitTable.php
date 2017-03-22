<?php
/**
 * Migration: CreateDeckUnitTable
 *
 */
class Migration_CreateDeckUnitTable extends CI_Migration {

  public function up() {
    // デッキの何番目にどのユニットが設定されているか
    $this->dbforge->add_field(array(
      'user_id' => array(
        'type' => 'INT',
        'constraint' => 11,
        'unsigned' => TRUE,
      ),
      'deck_id' => array(
        'type' => 'TINYINT',
        'unsigned' => TRUE,
      ),
      'order_in_deck' => array(
        'type' => 'TINYINT',
        'unsigned' => TRUE,
      ),
      'unit_id' => array(
        'type' => 'INT',
        'constraint' => 11,
        'unsigned' => TRUE,
      ),
    ));
    $this->dbforge->add_key(array('user_id', 'deck_id', 'order_in_deck'), TRUE);
    $this->dbforge->create_table('deck_unit');
    $this->db->query("ALTER TABLE deck_unit ADD FOREIGN KEY (user_id, deck_id) REFERENCES deck(user_id, deck_id) ON DELETE CASCADE;");
    $this->db->query("ALTER TABLE deck_unit ADD FOREIGN KEY (unit_id) REFERENCES unit(unit_id);");
  }

  public function down() {
    $this->dbforge->drop_table('deck_unit');
  }
}
