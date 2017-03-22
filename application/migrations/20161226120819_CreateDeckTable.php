<?php
/**
 * Migration: CreateDeckTable
 *
 * Created by: Cli for CodeIgniter <https://github.com/kenjis/codeigniter-cli>
 * Created on: 2016/12/26 12:08:19
 */
class Migration_CreateDeckTable extends CI_Migration {

  public function up() {
    // Creating a table
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
    ));
    $this->dbforge->add_key(array('user_id', 'deck_id'), TRUE);
    $this->dbforge->create_table('deck');
    $this->db->query("ALTER TABLE deck ADD FOREIGN KEY (user_id) REFERENCES user(user_id) ON DELETE CASCADE;");
  }

  public function down() {
    $this->dbforge->drop_table('deck');
  }
}
