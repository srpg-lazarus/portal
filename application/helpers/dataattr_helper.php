<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if ( ! function_exists('data_attr')) {
  function dataAttr($data, $indexes) {
    $result = '';
    foreach($indexes as $index) {
      if(isset($data[$index])) {
        $result .= sprintf(' data-%s="%s"', $index, $data[$index]);
      }
    }
    return substr($result, 1);
  }
}
