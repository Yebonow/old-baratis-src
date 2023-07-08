<!DOCTYPE html>
<html lang="en-GB">
  <head>
    <?php
      require_once $_SERVER['DOCUMENT_ROOT'] . '/php/head.php';
      ?>
    <title>Baratis Studio</title>
    <style id="showcase_container_css">
      .showcase-bg-img-container{background:url(/img/showcase-bg-studio.png);padding-top:30px;padding-bottom:30px;}.showcase-highlighted{background:#006aff;padding-top:30px;padding-bottom:30px}
    </style>
    <style>
      .showcase-bg-img img{margin-top:-10px}
    </style>
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
      <div class="showcase-bg-img-container margin-top-20">
      <center>
        <img src="/img/BaratisLogoStudio.png" alt="Baratis Studio" title="Baratis Studio Logo" height="250" class="force-up-2">
        <h2 class="text-not-bold margin-top-5 margin-bottom-10">Baratis Studio</h2>
        <h3 class="text-not-bold margin-top-0 margin-bottom-20"><i>The retro program that allows you to create your own games</i></h3>
        <hr>
        <a href="download"><button class="button button-blue">Download</button></a>
      </center>
        </div>
    </body>
  </html>