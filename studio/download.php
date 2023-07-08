<!DOCTYPE html>
<html lang="en-GB">
  <head>
    <?php
      require_once $_SERVER['DOCUMENT_ROOT'] . '/php/head.php';
      ?>
    <title>Baratis Studio</title>
   </head>
  <body>
    <?php
      if(is_null($_USER['id'])) {
        header("location: /login");
        }
      ?>
    <?php
      require_once $_SERVER['DOCUMENT_ROOT'] . '/studio/nav.php';
      ?>
   <div class="container">
    <div id="body">
      <center>
        <h2>u cant get it yet :/</h2>
      </center>
        </div>
     </div>
    </body>
  </html>