<?php
  $id = (int)$_GET['item'];
  
  require_once $_SERVER['DOCUMENT_ROOT'] . '/php/headOnlyPHP.php';
  
  $stmt = $dbh->prepare("SELECT * FROM ownedItems WHERE whatOwned = :wo AND ownedBy = :uid");
  $stmt->bindParam(":wo", $id);
  $stmt->bindParam(":uid", $user->getInfo("id"));
  $stmt->execute();
  
  if($stmt->rowCount() == '1') {
    die("<script>alert('You already own this item');history.back();</script>");
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
  
  $stmt3 = $dbh->prepare("INSERT INTO ownedItems (ownedBy, boughtFor, boughtDate, whatOwned) VALUES (:ob, :bf, :bd, :wo)");
  $stmt3->bindParam(":ob", $user->getInfo("id"));
  $stmt3->bindParam(":bf", $item[0]['price']);
  $stmt3->bindParam(":bd", date('Y-m-d H:i:s'));
  $stmt3->bindParam(":wo", $id);
  $stmt3->execute();
  
  $currentRealBux = $user->getInfo("realBux");
  
  $currentRealBuxNumeric = intval($user->getInfo("realBux"));
  
  $itemPriceNumeric = intval($item[0]['price']);
  
  $newRealBux = $currentRealBuxNumeric - $itemPriceNumeric;
  
  $stmt4 = $dbh->prepare("UPDATE users SET realBux = :nre WHERE id = :uid");
  $stmt4->bindParam(":nre", $newRealBux);
  $stmt4->bindParam(":uid", $user->getInfo("id"));
  $stmt4->execute();
  
  die('<script>window.close();</script>');
  exit;
  
  ?>
  