<?php
  $typeq = $_GET['type'];
  ?>
<!DOCTYPE html>
<html lang="en-GB">
  <head>
    <?php
      require_once $_SERVER['DOCUMENT_ROOT'] . '/php/head.php';
      ?>
    <title>Baratis</title>
   </head>
  <body>
    <?php
      if($typeq == 'game') { $selected = 'games';
                             }
      include $_SERVER['DOCUMENT_ROOT'] . '/php/nav.php';
      ?>
   <div class="container">
    <div id="body">
      <?php
      if($typeq == 'game') {
        echo '
          
          <h2>Add new game</h2>
          <form method="post" action="/api/addGame.php">
            <label for="title" class="display-block margin-bottom-10"><strong>Title</strong></label>
            <input type="text" placeholder="Type here" maxlength="350" name="title" id="title">
            <label for="description" class="display-block margin-top-10"><strong>Description</strong></label>
            <textarea rows="2" cols="60" placeholder="Type here" maxlength="650" name="description" id="description"></textarea>
            <label for="file" class="display-block margin-top-5"><strong>Place file</strong></label>
            <input type="file" name="file" id="file" accept=".rbxl, .rbxlx">
            <label for="thumb" class="display-block margin-top-10"><strong>Thumbnail file</strong></label>
            <input type="file" name="thumb" id="thumb" accept=".png, .jpg, .jpeg, .jfif">
            <div class="margin-top-15">
          <input type="submit" class="button button-blue" value="Add">
          </form>
          ';
        }
        ?>
      </div>
     </div>
    </body>
  </html>