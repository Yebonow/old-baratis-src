<!DOCTYPE html>
<html lang="en-GB">
  <head>
    <?php
      $id = (int)$_GET['id'];
      
      require_once $_SERVER['DOCUMENT_ROOT'] . '/php/head.php';
      ?>
    <title>Baratis - User</title>
   </head>
  <body>
    <?php
      
    $ProfileStmt = $dbh->prepare("SELECT * FROM users WHERE id = :uid");
    $ProfileStmt->bindParam(":uid", $id);
    $ProfileStmt->execute();
    $viewingUser = $ProfileStmt->fetch();
      
      
      if($user->getInfo("id") == $id) {
        $selected = 'profile';
        }
      else {
        $selected = 'users';
        }
      
      require_once $_SERVER['DOCUMENT_ROOT'] . '/php/nav.php';
      
      if(is_null($id)) {
        die('<center class="text-red">Please specify the ID of the user whose profile you wish to view in the \'id\' querystring</center>');
        exit;
        }
      
      if(is_null($viewingUser['id'])) {
        die('<center class="text-red">The user you specified does not exist</center>');
        exit;
        }
      
      $joinDate = date('M j Y', strtotime($viewingUser['joinDate']));
      
      ?>
   <div class="container">
    <div id="body">
      <?php
      if($viewingUser['isBanned'] != 0) {
        echo '<div class="alert alert-red margin-bottom-10 text-bold">This user has been banned</div>';
        }
      ?>
      <div class="box-container">
      <div class="box-header">
        <center>
        User
          </center>
        </div>
        <div class="box-content" style="min-height:352px">
          <center>
          <h2 class="margin-top-0 margin-bottom-10"><?php echo $viewingUser['username']; if($viewingUser['isBoosterClubMember']) { echo '<img class="vertical-align-middle force-up-2" src="/img/bplus.png" alt="Booster Club" title="Booster Club Member" height="25">'; } ?></h2>
          <?php if(!is_null($viewingUser['currentStatus'])) { echo '<q class="display-block">' . htmlspecialchars($viewingUser['currentStatus']) . '</q>'; } ?>
          <img src="avatar.php?id=<?php echo $viewingUser['id']; ?>" alt="<?php echo $viewingUser['username']; ?>'s character" title="<?php echo $viewingUser['username']; ?>">
          <h2 class="margin-top-0 margin-bottom-5">Blurb:</h2>
          <?php
          $beginBlurb = htmlspecialchars($viewingUser['blurb']);
    
$searches = array('{realbux}');
$replacements = array('<span class="text-green" title="' . $viewingUser['realBux'] . ' RealBux" style="cursor:default">' . $viewingUser['realBux'] . '&nbsp;<svg class="vertical-align-middle force-up-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash" viewBox="0 0 16 16">
  <path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
  <path d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2H3z"/>
</svg></span>');
$blurb = str_replace($searches, $replacements, $beginBlurb);
      ?>
  
          <span class="display-block margin-bottom-10"><?php if(!is_null($viewingUser['blurb'])) { echo $blurb; } else { echo '<i>This user has not set their blurb.</i>'; } ?></span>
          <br>
          <span class="margin-top-10 margin-bottom-10">Join date: <strong><?php echo $joinDate; ?></strong></span>
          <br><br>
          <?php
      if($user->getInfo("id") != $id) {
        if($viewingUser['isBanned'] == 0) {
          
          echo '
          <a href="/api/sendFriendRequest.php?id=' . $viewingUser['id'] . '" target="_blank" class="margin-right-5"><button class="button button-green"><svg class="force-down-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-add" viewBox="0 0 16 16">
  <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z"/>
  <path d="M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z"/>
</svg>&nbsp;Send friend request</button></a><a href="/mail/newMessage?recipient=' . $viewingUser['id'] . '" target="_blank" class="margin-left-5 margin-right-5"><button class="button button-blue"><svg class="force-down-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
  <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
</svg>&nbsp;Send message</button></a>'; }
        }
        
        ?>          <a href="/report?type=user&id=<?php echo $viewingUser['id']; ?>"><button class="button button-red"><svg class="force-down-2" xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-flag-fill" viewBox="0 0 16 16">
  <path d="M14.778.085A.5.5 0 0 1 15 .5V8a.5.5 0 0 1-.314.464L14.5 8l.186.464-.003.001-.006.003-.023.009a12.435 12.435 0 0 1-.397.15c-.264.095-.631.223-1.047.35-.816.252-1.879.523-2.71.523-.847 0-1.548-.28-2.158-.525l-.028-.01C7.68 8.71 7.14 8.5 6.5 8.5c-.7 0-1.638.23-2.437.477A19.626 19.626 0 0 0 3 9.342V15.5a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 1 0v.282c.226-.079.496-.17.79-.26C4.606.272 5.67 0 6.5 0c.84 0 1.524.277 2.121.519l.043.018C9.286.788 9.828 1 10.5 1c.7 0 1.638-.23 2.437-.477a19.587 19.587 0 0 0 1.349-.476l.019-.007.004-.002h.001"/>
</svg>&nbsp;Report Abuse</button></a>
            
            <?php
      if($user->getInfo("id") == $id) {
        echo '
          <a href="/account" class="margin-left-5"><button class="button button-blue"><svg class="force-down-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
  <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
</svg>&nbsp;&nbsp;Edit Profile</button></a>';
        }
      ?>
            </center>
          </div>
        </div>
      </div>
    <?php
      require_once $_SERVER['DOCUMENT_ROOT'] . '/php/footer.php';
      ?>
    </body>
  </html>