<?php
  include $_SERVER['DOCUMENT_ROOT'] . '/php/headNoCookie.php';
  
  session_start();
  
  session_destroy();
  
  setcookie('BARATISECURITY', '', time() - 1); // automatically make the cookie expire
  
  header('location: /');
  
  ?>