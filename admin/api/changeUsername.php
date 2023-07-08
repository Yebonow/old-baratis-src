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
            
            $changeTo = $_POST['changeTo'];
    
    $stmt = $dbh->prepare("UPDATE users SET username = :cht WHERE id = :uid");
    $stmt->bindParam(":uid", $userID);
    $stmt->bindParam(":cht", $changeTo);
    $stmt->execute();
    
  }
    
  
  header("location: /admin/changeUsername?succ=true");
  ?>
    