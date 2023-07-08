<?php
  header("content-type: text/raw");
  
  require_once $_SERVER['DOCUMENT_ROOT'] . '/php/headOnlyPHP.php';
  
  $userID = $_USER['id'];
  
  if(is_null($userID)) {
    
    die('User ID is blank.');
    exit;
    
    }
  
  include $_SERVER['DOCUMENT_ROOT'] . '/php/headOnlyPHP.php';
  
    $ProfileStmt = $dbh->prepare("SELECT * FROM users WHERE id = :uid");
    $ProfileStmt->bindParam(":uid", $userID);
    $ProfileStmt->execute();
    $user = $ProfileStmt->fetch();
  
  if($user['isWarned'] == 0) {
    die('User has no warnings');
    exit;
    }
  
  else {
    
    $stmt = $dbh->prepare("UPDATE users SET isWarned = 0, warnReason = '' WHERE id = :uid");
    $stmt->bindParam(":uid", $userID);
    $stmt->execute();
    
  }
  
  header("location: /home");
  ?>
    