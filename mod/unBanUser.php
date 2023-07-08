<!DOCTYPE html>
<html lang="en-GB">
  <head>
    <?php
      require_once $_SERVER['DOCUMENT_ROOT'] . '/php/head.php';
      if($user->getInfo("isMod") != 1) {
        die('    <title>Baratis</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/page.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Rubik:300,300i,400,400i,500,500i,700,700i,900,900i">
    
    </head>
  <body>
    <div class="container" style="padding-top:30px">
      <center>
        <img src="https://upload.wikimedia.org/wikipedia/commons/5/5e/Noto_Emoji_KitKat_1f62d.svg" alt="Blob" style="margin-bottom:15px">
        <h2>404</h2>
        <h3>Looks like the page you tried to enter doesn\'t exist.</h3>
        <a href="/"><button class="button button-blue">Home</button></a>
        </center>
      </div>
    </body>
  </html>
          ');
        exit;
        }
      ?>
    <title>Baratis - Moderator Panel</title>
   </head>
  <body>
    <?php
            $selected = 'mod';
      require_once $_SERVER['DOCUMENT_ROOT'] . '/php/nav.php';
      ?>
   <div class="container">
     <div id="body">
       <h2>Unban User</h2>
       <form method="post" action="/mod/api/unBanUser.php">
         <label for="userId">User ID: </label>
         <input type="text" placeholder="Type here" name="userId" id="userId">
         <br>
         <input type="submit" value="Go!">
         <?php
      $succ = $_GET['succ'];
      if($succ=='true') {
        echo '<span class="text-green">User unbanned successfully</span>';
        }
      ?>
         </form>
    <?php
      require_once $_SERVER['DOCUMENT_ROOT'] . '/php/footer.php';
      ?>
    </body>
  </html>