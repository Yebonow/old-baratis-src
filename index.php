<!DOCTYPE html>
<html lang="en-GB">
  <head>
    <?php
      require_once $_SERVER['DOCUMENT_ROOT'] . '/php/head.php';
      if(!is_null($user->getInfo('id'))) {
        header('location: /home');
        }
      ?>
    <meta name="theme-color" content="#004CFF">
    <meta property="og:title" content="Baratis - The best 2012">
    <meta property="og:site_name" content="Baratis">
    <meta property="og:description" content="Revive the past and bring the bricks back to life.">
    <meta property="og:type" content="website">
    <meta property="og:image" content="/img/short-triangle.png">
    <title>Baratis</title>
   </head>
  <body>
    <?php
      $selected = 'home';
      include $_SERVER['DOCUMENT_ROOT'] . '/php/loggedoutnav.php';
      ?>
   <div class="container">
    <div id="body">
      <div class="float-left" style="width:500px">
    <h1 class="margin-bottom-5 margin-top-0">Baratis</h1>
    <p class="text-grey margin-top-5">Revive the past and bring the bricks back to life.</p>
    <a href="/signup"><button type="button" class="button button-green">Sign up</button></a>
    <a href="/login"><button type="button" class="button button-blue">Log in</button></a>
      </div>
      <div class="float-right">
        <div style="height:450px;width:550px;background:#787878;color:white;padding:15px;border:1px solid black">
          <span>pretend theres a trailer here</span>
          </div>
        </div>
      </div>
     </div>
    </body>
  </html>