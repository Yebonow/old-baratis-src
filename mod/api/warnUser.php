<?php
  header("content-type: text/raw");
  
  $userID = $_POST['userId'];
  
  $warnReason = $_POST['reason'];
  
  if(is_null($userID)) {
    
    die('User ID is blank.');
    exit;
    
    }
  
  include $_SERVER['DOCUMENT_ROOT'] . '/php/headOnlyPHP.php';
  
    $ProfileStmt = $dbh->prepare("SELECT * FROM users WHERE id = :uid");
    $ProfileStmt->bindParam(":uid", $userID);
    $ProfileStmt->execute();
    $auser = $ProfileStmt->fetch();
  
  if($auser['isWarned'] == 1) {
    die('User is already warned');
    exit;
    }
  
  else {
    
        if($user->getInfo("isMod") != 1) {
          
          die();
          exit;
          
          } else {
            
            $userID = $_POST['userId'];
            
            $warnReason = $_POST['reason'];
            
    
    $stmt = $dbh->prepare("UPDATE users SET isWarned = 1, warnReason = :wr WHERE id = :uid");
    $stmt->bindParam(":uid", $userID);
    $stmt->bindParam(":wr", $warnReason);
    $stmt->execute();
    
  }
    }
    
  
  header("location: /mod/warnUser?succ=true");
  ?>
    