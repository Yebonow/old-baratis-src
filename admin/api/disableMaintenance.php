<?php
  header("content-type: text/raw");
  
  include $_SERVER['DOCUMENT_ROOT'] . '/php/headOnlyPHP.php';
  
    $ProfileStmt = $dbh->prepare("SELECT * FROM configuration WHERE id = '1'");
    $ProfileStmt->execute();
    $config = $ProfileStmt->fetch();

        if($user->getInfo("isAdministrator") != 1) {
          
          die();
          exit;
          
          } else {
            
      
      $stmt = $dbh->prepare("UPDATE configuration SET maintenanceEnabled = 0 WHERE id = '1'");

            
            
    $stmt->execute();
    
  }
    
  
  header("location: /maintenance");
  ?>
    