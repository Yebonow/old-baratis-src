<?php
  header("content-type: text/raw");
  
  include $_SERVER['DOCUMENT_ROOT'] . '/php/headOnlyPHP.php';
  
        if($user->getInfo("isAdministrator") != 1) {
          
          die();
          exit;
          
          } else {
    
    $stmt = $dbh->prepare("UPDATE configuration SET alertEnabled = 0 WHERE id = '1'");
    $stmt->execute();
    
  }
  
  header("location: /admin/index.php");
  ?>
    