<?php
  $id = (int)$_GET['item'];
  
  require_once $_SERVER['DOCUMENT_ROOT'] . '/php/head.php';
  
  $stmt = $dbh->prepare("SELECT * FROM ownedItems WHERE whatOwned = :wo AND ownedBy = :uid");
  $stmt->bindParam(":wo", $id);
  $stmt->bindParam(":uid", $user->getInfo("id"));
  $stmt->execute();
  
  if($stmt->rowCount() == '0') {
    die("<script>alert('You don't own this item');history.back();</script>");
    exit;
    }
  
  if(is_null($id)) {
    die();
    exit;
    }
  
  if(is_null($user->getInfo("id"))) {
    die();
    exit;
    }
  
  $stmt2 = $dbh->prepare("SELECT * FROM catalog WHERE id = :iid");
  $stmt2->bindParam(":iid", $id);
  $stmt2->execute();
  
  $item = $stmt2->fetchAll(PDO::FETCH_ASSOC);
  
  $stmt3 = $dbh->prepare("DELETE FROM ownedItems WHERE whatOwned = :iid AND ownedBy = :uid");
  $stmt3->bindParam(":iid", $id);
  $stmt3->bindParam(":uid", $user->getInfo("id"));
  $stmt3->execute();
  
  die('<script>window.close();</script>');
  exit;
  
  ?>
  