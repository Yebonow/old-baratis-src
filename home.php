<!DOCTYPE html>
<html lang="en-GB">
  <head>
    <?php
      require_once $_SERVER['DOCUMENT_ROOT'] . '/php/head.php';
      ?>
    <title>Baratis - Home</title>
   </head>
  <body>
    <?php
            $selected = 'home';
      require_once $_SERVER['DOCUMENT_ROOT'] . '/php/nav.php';
      ?>
   <div class="container">
    <div id="body">
      <br>
    <h1 class="margin-bottom-5 margin-top-0">Hi there, <?php echo $user->getInfo("username"); ?>!</h1>
      <center>
    <div class="generic-box">
      <h2 class="margin-top-0 margin-bottom-5">Feed</h2>
      <?php
      $stmt = $dbh->prepare("SELECT * FROM feed");
      $stmt->execute();
      
      $feeds = $stmt->fetchAll(PDO::FETCH_ASSOC);
      
      $stmt2 = $dbh->prepare("SELECT * FROM friends WHERE friendsWith = :uid");
      $stmt2->bindParam(":uid", $user->getInfo("id"));
      $stmt2->execute();
      
      $friends = $stmt2->fetchAll(PDO::FETCH_ASSOC);
      foreach($feeds as $feed) {
        $stmt3 = $dbh->prepare("SELECT * FROM users WHERE id = :id");
        $stmt3->bindParam(":id", $feed[0]['feedPoster']);
        $stmt3->execute();
        
        $user = $stmt3->fetchAll(PDO::FETCH_ASSOC);
        
        if(isFriendsWith($feed['feedPoster']) == true) {
        echo '<a href="/user?id=' . $feed[0]['feedPoster'] . '"><img src="/avatar.php?id=' . $feed[0]['feedPoster'] . '" alt="' . $user['username'] . '" title="Character"></a>
                                                                                                                                        ';
          }
        }
        ?>
      </div>
        </center>
    <?php
      require_once $_SERVER['DOCUMENT_ROOT'] . '/php/footer.php';
      ?>
    </body>
  </html>