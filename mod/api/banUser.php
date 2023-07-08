<?php
  header("content-type: text/raw");
  
  $userID = $_POST['userId'];
  
  $banReason = $_POST['reason'];
  
  if(is_null($userID)) {
    
    die('User ID is blank.');
    exit;
    
    }
  
  include $_SERVER['DOCUMENT_ROOT'] . '/php/headOnlyPHP.php';
  
    $ProfileStmt = $dbh->prepare("SELECT * FROM users WHERE id = :uid");
    $ProfileStmt->bindParam(":uid", $userID);
    $ProfileStmt->execute();
    $auser = $ProfileStmt->fetch();
  
  if($auser['isBanned'] == 1) {
    die('User is already banned');
    exit;
    }
  
  else {
    
        if($user->getInfo("isMod") != 1) {
          
          die();
          exit;
          
          } else {
            
            $userID = $_POST['userId'];
            
            $banReason = $_POST['reason'];
            
    
    $stmt = $dbh->prepare("UPDATE users SET isBanned = 1, banReason = :br WHERE id = :uid");
    $stmt->bindParam(":uid", $userID);
    $stmt->bindParam(":br", $banReason);
    $stmt->execute();
    
  }
    }
    
  
  header("location: /mod/banUser?succ=true");
  ?>
    