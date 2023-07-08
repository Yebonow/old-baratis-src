<!DOCTYPE html>
<html lang="en-GB">
  <?php
    session_start();
?>
  <head><?php
$dsn = "mysql:host=mysql0.serv00.com;dbname=m2210_baratisDB";
$username = "m2210_baratisDB";
$password = "UC*yAQ1]Q3o9K5y2MAcY:b4Bn.WKi3";
$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
$dbh = new PDO($dsn, $username, $password, $options);
?>
        <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="Shortcut Icon" href="https://www.baratis.tk/img/short-triangle.png">
<link rel="stylesheet" href="https://www.baratis.tk/css/buttons.css">
<link rel="stylesheet" href="https://www.baratis.tk/css/page.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Rubik:300,300i,400,400i,500,500i,700,700i,900,900i">
    <title>Baratis - Banned</title>
    </head>
  <body>
    <?php
    
    $userID = $_SESSION["userID"];
      
      $UserStmt = $dbh->prepare("SELECT * FROM users WHERE id = :uid");
    $UserStmt->bindParam(":uid", $userID);
    $UserStmt->execute();
    $_USER = $UserStmt->fetch();
      
    if($_USER['isBanned'] == false) {
      header("location: /home");
      }

      ?>
    <center>
      <div class="container margin-top-10">
      <div class="generic-box" style="width:800px">
        <h2>Banned</h2>
        <p class="margin-top-0 margin-bottom-5">Our moderators have determined that your behaviour on Baratis is in violation of our <a href="/rules">Rules</a></p>
        <p class="margin-top-0 margin-bottom-5">Your account has been permanently terminated</p>
        <p class="margin-top-0 margin-bottom-5">Reason: <?php echo $_USER['banReason']; ?></p>
      </div>
      </div>
     </center>
   </body>
  </html>
  