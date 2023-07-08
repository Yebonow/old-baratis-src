<?php
  header("content-type: text/raw");
  
  $alertText = $_POST['alertText'];
  
  $alertColour = $_POST['colour'];
  
  if(is_null($alertText)) {
    
    die('Alert text is blank.');
    exit;
    
    }
  
  if(is_null($alertColour)) {
    
    die('Alert colour is blank');
    exit;
    
    }
  
  include $_SERVER['DOCUMENT_ROOT'] . '/php/headOnlyPHP.php';
  
        if($user->getInfo("isAdministrator") != 1) {
          
          die();
          exit;
          
          } else {
    
    $stmt = $dbh->prepare("UPDATE configuration SET alertEnabled = 1, alertColour = :ac, alertContents = :at WHERE id = '1'");
    $stmt->bindParam(":ac", $alertColour);
    $stmt->bindParam(":at", $alertText);
    $stmt->execute();
    
  }
  
  header("location: /admin/alert?succ=true");
  ?>
    