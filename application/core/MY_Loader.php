<?php
class MY_Loader extends CI_Loader {

  function __construct() {
    parent::__construct();
    $this->header_path = "common/header";
    $this->footer_path = "common/footer";
  }

  public function set_header($view) {
    $this->header_path = $view;
  }

  public function set_footer($view) {
    $this->footer_path = $view;
  }

  public function view($view, $vars = array(), $return = FALSE) {
    $ci =& get_instance();
    $class = $ci->router->fetch_class();
    $action = $ci->router->fetch_method();

    $vars['_class'] = $class;
    $vars['_action'] = $action;

    $exploded_view = explode('/', $view);
    $addHeaderFooter = end($exploded_view)[0] != '_';

    if($return) {
      $content = $addHeaderFooter ? parent::view($this->header_path, $vars, $return) : '';
      $content .= parent::view($view, $vars, $return);
      $content .= $addHeaderFooter ? parent::view($this->footer_path, $vars, $return) : '';
      return $content;
    } else {
      if($addHeaderFooter) parent::view($this->header_path, $vars);
      parent::view($view, $vars);
      if($addHeaderFooter) parent::view($this->footer_path, $vars);
    }
  }
}
