<?php
/**
 * Migration: CreateUnitTable
 *
 * Created by: Cli for CodeIgniter <https://github.com/kenjis/codeigniter-cli>
 * Created on: 2017/01/23 19:49:50
 */
class Migration_CreateUnitTable extends CI_Migration {

  public function up() {
    // ユニットテーブル
    $this->dbforge->add_field(array(
      'unit_id' => array(
        'type' => 'INT',
        'constraint' => 11,
        'unsigned' => TRUE,
      ),
      'klass_id' => array(
        'type' => 'INT',
        'constraint' => 11,
        'unsigned' => TRUE,
      ),
      'name' => array(
        'type' => 'VARCHAR',
        'constraint' => 32,
      ),
      'hp' => array(
        'type' => 'TINYINT',
        'unsigned' => TRUE,
      ),
      'power' => array(
        'type' => 'TINYINT',
        'unsigned' => TRUE,
      ),
      'defence' => array(
        'type' => 'TINYINT',
        'unsigned' => TRUE,
      ),
      'faith' => array(
        'type' => 'TINYINT',
        'unsigned' => TRUE,
      ),
      'skill' => array(
        'type' => 'TINYINT',
        'unsigned' => TRUE,
      ),
      'luck' => array(
        'type' => 'TINYINT',
        'unsigned' => TRUE,
      ),
      'hit' => array(
        'type' => 'TINYINT',
        'unsigned' => TRUE,
      ),
      'min_range' => array(
        'type' => 'TINYINT',
        'unsigned' => TRUE,
      ),
      'max_range' => array(
        'type' => 'TINYINT',
        'unsigned' => TRUE,
      ),
      'cost' => array(
        'type' => 'TINYINT',
        'unsigned' => TRUE,
      ),
    ));
    $this->dbforge->add_key('unit_id', TRUE);
    $this->dbforge->create_table('unit');
    $this->db->query("ALTER TABLE unit ADD FOREIGN KEY (klass_id) REFERENCES klass(klass_id) ON DELETE CASCADE;");
  }

  public function down() {
    $this->dbforge->drop_table('unit');
  }
}
