<?php
/**
 * Migration: Create_user
 *
 * Created by: Cli for CodeIgniter <https://github.com/kenjis/codeigniter-cli>
 * Created on: 2016/12/19 08:55:24
 */
class Migration_Create_user extends CI_Migration {

  public function up()
  {
    // Creating a table
    $this->dbforge->add_field(array(
      'user_id' => array(
        'type' => 'INT',
        'constraint' => 11,
        'unsigned' => TRUE,
        'auto_increment' => TRUE,
      ),
      'username' => array(
        'type' => 'VARCHAR',
        'constraint' => 32,
        'unique' => TRUE,
        'default' => '',
      ),
      'password_hash' => array(
        'type' =>'VARCHAR',
        'constraint' => '255',
        'default' => '',
      ),
      'created_at' => array(
        'type' => 'DATETIME',
        'default' => '1970-01-01 00:00:00',
      ),
      'updated_at' => array(
        'type' => 'DATETIME',
        'default' => '1970-01-01 00:00:00',
      ),
    ));
    $this->dbforge->add_key('user_id', TRUE);
    $this->dbforge->create_table('user');
  }

  public function down()
  {
    // Dropping a table
    $this->dbforge->drop_table('user');
  }

}
