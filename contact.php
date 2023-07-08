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
      $selected = 'contact';
      include $_SERVER['DOCUMENT_ROOT'] . '/php/loggedoutnav.php';
      ?>
    <style>
      .container h1 {
        margin-top: 30px;
        }
      </style>    <div class="container">
    <div id="body">
    <h1>Contact</h1>
    <p>Email: contact@baratis.tk</p>
    <hr>
    <a href="mailto:contact@baratis.tk"><button type="button" class="btn btn-primary">Open in app</button></a>
      </div>
      </div>
    <?php
      require_once $_SERVER['DOCUMENT_ROOT'] . '/php/footer.php';
      ?>
    </body>
  </html>