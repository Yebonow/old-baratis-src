<?php
  $type = $_GET['type'];
  
 
  
  ?>
<!DOCTYPE html>
<html lang="en-GB">
  <head>
    <?php
      require_once $_SERVER['DOCUMENT_ROOT'] . '/php/head.php';
  
  if($type == 'user') {
    
    $id = $_GET['id'];
    
    }
      ?>
    <title>Baratis - Report Abuse</title>
   </head>
  <body>
    <?php
      if($_GET['type'] == 'user') {
      $selected = 'users';
        }
      if($_GET['type'] == 'game') {
        $selected = 'games';
        }
      include $_SERVER['DOCUMENT_ROOT'] . '/php/nav.php';
      ?>
   <div class="container">
    <div id="body">
      <h2>Report Abuse</h2>
      <form method="post" action="/api/sendReport.php">
        <?php
        if($type == 'user') {
          echo '
        <label for="reason">What did the user do that was breaking the rules? </label>
        <br><input type="text" placeholder="Type here" name="reason" id="reason" class="margin-bottom-5">
        <br><button type="submit" class="button button-blue">Submit</button>
            ';}
          ?>
        </form>
      </div>
     </div>
    </body>
  </html>