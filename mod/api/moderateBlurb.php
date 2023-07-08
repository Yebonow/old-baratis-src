<?php
  header("content-type: text/raw");
  
  $userID = $_POST['userId'];
  
  if(is_null($userID)) {
    
    die('User ID is blank.');
    exit;
    
    }
  
  include $_SERVER['DOCUMENT_ROOT'] . '/php/headOnlyPHP.php';
  
    $ProfileStmt = $dbh->prepare("SELECT * FROM users WHERE id = :uid");
    $ProfileStmt->bindParam(":uid", $userID);
    $ProfileStmt->execute();
    
        if($user->getInfo("isMod") != 1) {
          
          die();
          exit;
          
          } else {
            
            $userID = $_POST['userId'];
            
  
    $stmt = $dbh->prepare("UPDATE users SET blurb = '[ Content Deleted ]' WHERE id = :uid");
    $stmt->bindParam(":uid", $userID);
    $stmt->execute();
            
           
            
            
  }
    
    
  
  header("location: /mod/moderateBlurb?succ=true");
  ?>
    