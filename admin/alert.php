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
       <h2>Set alert</h2>
       <form method="post" action="/admin/api/alert.php">
         <label for="alertText">Alert text: </label><br>
         <textarea placeholder="Type here" name="alertText" id="alertText" cols="65" maxlength="125"></textarea>
         <br>
         <label for="alertColour">Alert colour: </label><br>
         <label for="blue">Blue&nbsp;<span style="background:#006aff;border:1px solid #004099;font-size:0.8em;height:16px" class="display-inline rounded-corners force-up-1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></label>
         <input type="radio" name="colour" value="blue" id="blue">
         <br>
         <label for="red">Red&nbsp;<span style="border:1px solid #7b0000;background:#e10000;font-size:0.8em;height:16px" class="display-inline rounded-corners force-up-1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></label>
         <input type="radio" name="colour" value="red" id="red">
         <br>
         <label for="green">Green&nbsp;<span style="border:1px solid #006800;background:#00ce00;font-size:0.8em;height:16px" class="display-inline rounded-corners force-up-1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></label>
         <input type="radio" name="colour" value="green" id="green">
         <br>
         <label for="yellow">Yellow&nbsp;<span style="border:1px solid #660;background:#ff0;font-size:0.8em;height:16px" class="display-inline rounded-corners force-up-1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></label>
         <input type="radio" name="colour" value="yellow" id="yellow">
         <br>
         <input type="submit" value="Go!">
         <?php
      $succ = $_GET['succ'];
      if($succ=='true') {
        echo '<span class="text-green">Alert set successfully</span>';
        }
      ?>
         </form>
    <?php
      require_once $_SERVER['DOCUMENT_ROOT'] . '/php/footer.php';
      ?>
    </body>
  </html>