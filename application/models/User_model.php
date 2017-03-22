<?php

class User_model extends CI_Model {

  public function get_users() {
    $query = $this->db->get('user');
    return $query->result_array();
  }

  public function create($username, $password) {
    $now = new DateTime();
    $data = array(
      'username' => $username,
      'password_hash' => password_hash($password, PASSWORD_DEFAULT),
      'created_at' => $now->format('Y-m-d h:m:s'),
      'updated_at' => $now->format('Y-m-d h:m:s'),
    );
    $result = $this->db->insert('user', $data);
    if($result) {
      $this->login($username, $password);
    }
    return $result;
  }

  public function login($username, $password) {
    $query = $this->db->select()->from('user')->where('username', $username)->limit(1)->get();
    $result = $query->result();

    foreach($result as $user) {
      if(password_verify($password, $user->password_hash)) {
        $_SESSION['user_id'] = $user->user_id;
        $_SESSION['username'] = $user->username;
        return $user;
      }
    }
    return false;
  }

  public function logout() {
    unset($_SESSION['user_id']);
    unset($_SESSION['username']);
  }
}
