<?php
  
  $c = $_GET['c'];
  
  if(is_null($c)) {
    header("location: showCategories");
    die();
    exit;
    
    }
  
  ?>