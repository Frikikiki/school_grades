<?php

function convertStringToArray($string, $separator) {

  $arr = array();
  $str = "";
  $isString = false;

  for($i = 0; $i < strlen($string); $i++) {
    $char = $string[$i];
    if($char != $separator) {
      $str .= $char;
      $isString = true;
      if($i == strlen($string) - 1) {
        array_push($arr, $str);
      }
    }
    else if ($isString) {
      array_push($arr, $str);
      $isString = false;
      $str = "";
    }
  }
  
  return $arr;
}

?>