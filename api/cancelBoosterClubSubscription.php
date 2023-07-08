<?php
  header("content-type: text/raw");
  
  include $_SERVER['DOCUMENT_ROOT'] . '/php/head.php';
  
  if($_USER['isBoosterClubMember'] != 1) {
    die('User does not have Booster Club');
    exit;
    }
  else {
        if(is_null($_USER['id'])) {
          
          die('User is logged out');
          exit;
          
          } else {
    
    $stmt = $dbh->prepare("UPDATE users SET isBoosterClubMember = 0 WHERE id = :uid");
    $stmt->bindParam(":uid", $_USER['id']);
    $stmt->execute();
    
  }
    }
  
  header("location: /membership");
  ?>
    