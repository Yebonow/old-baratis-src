<?php
  
  $theme = $_GET['theme'];
  
  require_once $_SERVER['DOCUMENT_ROOT'] . '/php/head.php';
  
  if($theme == '1') {
    
    $stmt = $dbh->prepare("UPDATE users SET theme = :nth WHERE id = :uid");
    $stmt->bindParam(":uid", $user->getInfo("id"));
    $stmt->bindParam(":nth", $theme);
    $stmt->execute();
    
    }
  
  die('<script>history.back();</script>');
  exit;
  
  ?>