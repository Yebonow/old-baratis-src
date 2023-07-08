<!DOCTYPE html>
<html lang="en-GB">
  <head>
    <?php
      require_once $_SERVER['DOCUMENT_ROOT'] . '/php/head.php';
      ?>
    <title>Baratis - Membership</title>
   </head>
  <body>
    <?php
            $selected = 'membership';
      require_once $_SERVER['DOCUMENT_ROOT'] . '/php/nav.php';
      ?>
   <div class="container">
     <center>
       <img src="/img/bplus.png" alt="Booster Club Icon" title="Booster Club">
       <h2>Booster Club</h2>
       <?php
      if($_USER['isBoosterClubMember'] != 1) {
        echo '
       <hr>
       <p>Booster Club is a premium membership that can be obtained by boosting our <a href="https://discord.gg/beetNZztQ8">discord server</a>.</p>
       </center>
       <h3>Perks</h3>
       <li>A badge next to your username</li>
       <li>Having the ability to create five places rather than just one</li>
       <li>Having access to test our latest features</li>
       <li>Daily gift of 45 RealBux</li>
       <hr>
       <small class="text-grey">When you boost the server, you will not be immediately awarded Booster Club. Please contact our administrators to give you Booster Club once you boost the server.</small>
          ';
        }
      else {
        echo '
          <hr>
          <h3>Options</h3>
          <a href="/api/cancelBoosterClubSubscription.php"><button class="button button-red">Cancel Booster Club Membership</button></a>
          </center>
          ';
        }
      require_once $_SERVER['DOCUMENT_ROOT'] . '/php/footer.php';
      ?>
    </body>
  </html>