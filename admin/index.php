<!DOCTYPE html>
<html lang="en-GB">
  <head>
    <?php
      require_once $_SERVER['DOCUMENT_ROOT'] . '/php/head.php';
      if($user->getInfo("isAdministrator") != 1) {
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
    <title>Baratis - Admin Panel</title>
   </head>
  <body>
    <?php
            $selected = 'admin';
      require_once $_SERVER['DOCUMENT_ROOT'] . '/php/nav.php';
      ?>
   <div class="container">
     <div id="body">
       <h2>Admin Panel</h2>
       <a href="/admin/giveBoosterClub" class="display-block margin-bottom-5"><button class="button button-green">Give user Booster Club</button></a>
       <a href="/admin/revokeBoosterClub" class="display-block margin-bottom-5"><button class="button button-red">Revoke Booster Club</button></a>
       <a href="/admin/alert" class="display-block margin-bottom-5"><button class="button button-blue">Set alert</button></a>
       <a href="/admin/disableAlert" class="display-block margin-bottom-5"><button class="button button-red">Disable alert</button></a>
       <a href="/admin/logIntoAccount" class="display-block margin-bottom-5"><button class="button button-green">Log into account</button></a>
       <a href="/admin/releaseNewItem" class="display-block margin-bottom-5"><button class="button button-blue">Release new item</button></a>
       <a href="/admin/changeUsername" class="display-block margin-bottom-5"><button class="button button-green">Change username</button></a>
       <a href="/admin/maintenance" class="display-block margin-bottom-5"><button class="button button-red">Maintenance</button></a>
    <?php
      require_once $_SERVER['DOCUMENT_ROOT'] . '/php/footer.php';
      ?>
    </body>
  </html>