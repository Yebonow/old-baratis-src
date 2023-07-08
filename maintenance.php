<?php
  
require_once $_SERVER['DOCUMENT_ROOT'] . '/php/db.php';

?>
<!DOCTYPE html>
<html lang="en-GB">
  <head>
    <?php
      require_once $_SERVER['DOCUMENT_ROOT'] . '/php/headMaintenance.php';
      ?>
        <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="Shortcut Icon" href="https://www.baratis.tk/img/short-triangle.png">
<link rel="stylesheet" href="https://www.baratis.tk/css/buttons.css">
<link rel="stylesheet" href="https://www.baratis.tk/css/page.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Rubik:300,300i,400,400i,500,500i,700,700i,900,900i">
    <title>Baratis - Maintenance</title>
   </head>
  <body>
    <div id="body">
      <center>
        <h2>Baratis</h2>
        <p>Baratis is currently in maintenance. It will come back soon.</p>
        <?php
  
$stmt = $dbh->prepare("SELECT * FROM configuration WHERE id = '1'");
$stmt->execute();
  
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
  
  if($row['maintenanceEnabled'] == 0) {
    header("location: /");
    }
  
  if(!is_null($row) || $row != '') {
    echo '<i>' . $row['maintenanceMessage'] . '</i>';
}
  
  }
  
  if($_POST['code'] == 'SecretCode2023BARATIS') {
    
    $yesEcho = '<span class="text-green">Disabling maintenance...</span>';
    
  include $_SERVER['DOCUMENT_ROOT'] . '/php/headOnlyPHP.php';

            
      
      $stmt = $dbh->prepare("UPDATE configuration SET maintenanceEnabled = 0 WHERE id = '1'");

            
            
    $stmt->execute();
    
  }
    
    
   
  
  if($_POST['code'] == 'SecretBypassCCode2023BARATIS') {
    
    setcookie("BYPASSMAINTENANCE", 'yes', 99999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999*999999999999999999999, "/");
    
    }
?>
        <form method="post" action="/maintenance">
          <label for="secretinput">BARATIS</label>
          <input type="password" name="code" placeholder="BARATIS">
          <input type="submit" value="B"><input type="submit" value="A"><input type="submit" value="R"><input type="submit" value="A"><input type="submit" value="T"><input type="submit" value="I"><input type="submit" value="S">
          <?php
    echo $yesEcho;
    ?>
          </form>
        </center>
      </div>
    </body>
  </html>