<!DOCTYPE html>
<html lang="en-GB">
  <head>
    <?php
      require_once $_SERVER['DOCUMENT_ROOT'] . '/php/head.php';
      if($user->getInfo("isMod") == false) {
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
       <h2>Moderation Panel</h2>
       <a href="/mod/banUser" class="display-block margin-bottom-5"><button class="button button-red">Ban user</button></a>
       <a href="/mod/unBanUser" class="display-block margin-bottom-5"><button class="button button-red">Unban user</button></a>
       <a href="/mod/warnUser" class="display-block margin-bottom-5"><button class="button button-red">Warn user</button></a>
       <a href="/mod/moderateStatus" class="display-block margin-bottom-5"><button class="button button-red">Moderate Status</button></a>
       <a href="/mod/moderateBlurb" class="display-block margin-bottom-5"><button class="button button-red">Moderate Blurb</button></a>
       <a href="/mod/moderateUsername" class="display-block margin-bottom-5"><button class="button button-red">Moderate Username</button></a>
    <?php
      require_once $_SERVER['DOCUMENT_ROOT'] . '/php/footer.php';
      ?>
    </body>
  </html>