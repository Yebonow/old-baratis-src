<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Content-Type: text/css");
  
  require_once $_SERVER['DOCUMENT_ROOT']  . '/php/headOnlyPHP.php';
  
  /* CSS Variables */
  
  $colorBlueBorder = '#005adb';
  $colorBlueBackground = '#0069FF';
  
  $colorGreenBorder = '#005700';
  $colorGreenBackground = '#00a200';
  
  $colorRedBorder = '#7b0000';
  $colorRedBackground = '#e10000';
  
  $colorGreyBorder = '#a6a6a6';
  $colorGreyBackground = '#7e7e7e';
  
  include 'stylesheet.css';
  
?>