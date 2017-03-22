<?php
/**
 * Migration: CreateKlassTable
 *
 * Created by: Cli for CodeIgniter <https://github.com/kenjis/codeigniter-cli>
 * Created on: 2017/01/23 19:49:43
 */
class Migration_CreateKlassTable extends CI_Migration {
  public function up() {
    // Creating a table
    $this->dbforge->add_field(array(
      'attack_type_id' => array(
        'type' => 'INT',
        'constraint' => 11,
        'unsigned' => TRUE,
        'auto_increment' => TRUE,
      ),
      'name' => array(
        'type' => 'VARCHAR',
        'constraint' => 32,
        'default' => '',
      ),
    ));
    $this->dbforge->add_key('attack_type_id', TRUE);
    $this->dbforge->create_table('attack_type');

    $this->dbforge->add_field(array(
      'move_type_id' => array(
        'type' => 'INT',
        'constraint' => 11,
        'unsigned' => TRUE,
        'auto_increment' => TRUE,
      ),
      'name' => array(
        'type' => 'VARCHAR',
        'constraint' => 32,
        'default' => '',
      ),
    ));
    $this->dbforge->add_key('move_type_id', TRUE);
    $this->dbforge->create_table('move_type');
    
    $this->dbforge->add_field(array(
      'klass_id' => array(
        'type' => 'INT',
        'constraint' => 11,
        'unsigned' => TRUE,
      ),
      'name' => array(
        'type' => 'VARCHAR',
        'constraint' => 32,
        'default' => '',
      ),
      'attack_type_id' => array(
        'type' => 'INT',
        'constraint' => 11,
        'unsigned' => TRUE,
      ),
      'move_type_id' => array(
        'type' => 'INT',
        'constraint' => 11,
        'unsigned' => TRUE,
      ),
    ));
    $this->dbforge->add_key('klass_id', TRUE);
    $this->dbforge->create_table('klass');
    $this->db->query("ALTER TABLE klass ADD FOREIGN KEY (attack_type_id) REFERENCES attack_type(attack_type_id) ON DELETE CASCADE;");
    $this->db->query("ALTER TABLE klass ADD FOREIGN KEY (move_type_id) REFERENCES move_type(move_type_id) ON DELETE CASCADE;");
  }

  public function down() {
    $this->dbforge->drop_table('klass');
    $this->dbforge->drop_table('move_type');
    $this->dbforge->drop_table('attack_type');
  }
}
