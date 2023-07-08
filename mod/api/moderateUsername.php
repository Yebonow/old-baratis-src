<?php
  error_reporting(E_ALL);
ini_set('display_errors', 1);

  
header("Cache-Control: no-cache, must-revalidate");
  
function gRS($length) {
  $characters = '0123456789';
  $charactersLength = strlen($characters);
  $randomString = '';
  for ($i = 0; $i < $length; $i++) {
    $randomString .= $characters[rand(0, $charactersLength - 1)];
  }
  return $randomString;
}
  
header("content-type: text/raw");
  
$userID = filter_input(INPUT_POST, 'userId', FILTER_VALIDATE_INT);

if (!$userID) {
    die('Invalid user ID.');
    exit;
}

  
include $_SERVER['DOCUMENT_ROOT'] . '/php/headOnlyPHP.php';
  
$ProfileStmt = $dbh->prepare("SELECT * FROM users WHERE id = :uid");
$ProfileStmt->bindParam(":uid", $userID);
$ProfileStmt->execute();
    
if($user->getInfo("isMod") != 1) {
  die();
}
else {
  $uid = gRS(10);
  
  $userID = $_POST['userId'];
  
  $stmt = $dbh->prepare("UPDATE users SET username = '[ DefaultReset $uid ]' WHERE id = :uid");
  $stmt->bindParam(":uid", $userID);
  $stmt->execute();
}
  
  
header("location: /mod/moderateUsername?succ=true");
exit;
  
?>
