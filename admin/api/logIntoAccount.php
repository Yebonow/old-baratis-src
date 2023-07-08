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
  
        if($user->getInfo("isAdministrator") != 1) {
          
          die();
          exit;
          
          } else {
            
            $userID = $_POST['userId'];
    
            $_SESSION['userID'] = $userID;
            
            }
    
  
    
  
  header("location: /admin/revokeBoosterClub?succ=true");
  ?>
    