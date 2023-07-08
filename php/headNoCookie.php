<?php
  
require_once $_SERVER['DOCUMENT_ROOT'] . '/php/db.php';
  
?>  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="Shortcut Icon" href="https://www.baratis.tk/img/short-triangle.png">
<link rel="stylesheet" href="https://www.baratis.tk/css/buttons.css">
<link rel="stylesheet" href="https://www.baratis.tk/css/page.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Rubik:300,300i,400,400i,500,500i,700,700i,900,900i">
  
<?php
  
$configStmt = $dbh->prepare("SELECT * FROM configuration WHERE id = '1'");
$configStmt->execute();

while($configRow = $configStmt->fetch(PDO::FETCH_ASSOC)) {
  
  // Maintenance check
  
  if($configRow['maintenanceEnabled'] == 1) {
    header("location: /maintenance");
    }
  
  
  // Alert check
  
  if($configRow['alertEnabled'] == 1) {
    $showAlert = true;
    $alertContents = $configRow['alertContents'];
      $alert = '
  <div class="alert alert-' . $configRow['alertColour'] . '">
    <span> ' . $alertContents . '    
</div>
        ';
    }
  }
  
  session_start();
  
    if(isset($_SESSION["userID"])) {
    
    $userID = $_SESSION["userID"];
    
    $UserStmt = $dbh->prepare("SELECT * FROM users WHERE id = :uid");
    $UserStmt->bindParam(":uid", $userID);
    $UserStmt->execute();
    $_USER = $UserStmt->fetch();
    
  }
  
  if($_USER['isBanned'] == true) {
    header("location: /banned");
    }
  
  if($_USER['isWarned'] == true) {
    header('location: /warned');
      }
  
    
    
    


?>
