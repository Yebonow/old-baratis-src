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
    $affUser = $ProfileStmt->fetch();
  
  if($affUser['isBoosterClubMember'] == 0) {
    die('User has no Booster Club');
    exit;
    }
  
  else {
        if($user->getInfo("isAdministrator") != 1) {
          
          die();
          exit;
          
          } else {
            
            $userID = $_POST['userId'];
    
    $stmt = $dbh->prepare("UPDATE users SET isBoosterClubMember = 0 WHERE id = :uid");
    $stmt->bindParam(":uid", $userID);
    $stmt->execute();
    
  }
    }
  
  header("location: /admin/revokeBoosterClub?succ=true");
  ?>
    