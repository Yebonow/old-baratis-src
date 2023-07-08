<?php
  require_once $_SERVER['DOCUMENT_ROOT'] . '/php/head.php';
  if(is_null($user->getInfo('id'))) {
    
    header("location: /login");
    
    }
  
  ?>
<div id="navbar">
  <div class="container">
  <img src="/img/BaratisLogoShort.png" class="vertical-align-middle force-up-1 op-1 margin-right-5" alt="Baratis Logo" title="Home" height="25">
  <a href="/home" class="navbar-item margin-left-5 margin-right-5 <?php if($selected == 'home') { echo 'op-1'; } ?>">Home</a>
  <a href="/games" class="navbar-item margin-left-5 margin-right-5 <?php if($selected == 'games') { echo 'op-1'; } ?>">Games</a>
  <a href="/catalog" class="navbar-item margin-left-5 margin-right-5 <?php if($selected == 'catalog') { echo 'op-1'; } ?>">Catalog</a>
  <a href="/users" class="navbar-item margin-left-5 margin-right-5 <?php if($selected == 'users') { echo 'op-1'; } ?>">Users</a>
  <a href="/groups" class="navbar-item margin-left-5 margin-right-5 <?php if($selected == 'groups') { echo 'op-1'; } ?>">Groups</a>
  <a href="/news" class="navbar-item margin-left-5 margin-right-5 <?php if($selected == 'news') { echo 'op-1'; } ?>">News</a>
  <a href="/forum/sp" class="navbar-item margin-left-5 <?php if($user->getInfo('isAdministrator')==1){echo'margin-right-5';}?><?php if($selected=='forum'){ echo 'op-1'; } ?>">Forum</a>
  <?php
  if($user->getInfo('isAdministrator') == 1) {
    if($selected == 'admin') {
      echo '<a href="/admin/index.php" class="navbar-item margin-left-5 margin-right-5 op-1">Admin</a>';
      } else {
    echo '<a href="/admin/index.php" class="navbar-item margin-left-5 margin-right-5">Admin</a>';
    }
    }
  ?>
    
    <?php
  
  if($user->getInfo('isMod') == 1 || $user->getInfo('isAdministrator')) {
    if($selected == 'mod') {
      echo '<a href="/mod/index.php" class="navbar-item margin-left-5 op-1">Mod</a>';
      } else {
    echo '<a href="/mod/index.php" class="navbar-item margin-left-5">Mod</a>';
    }
    }
  ?>
    <div class="float-right">
      <a href="/user?id=<?php echo $user->getInfo('id'); ?>" class="navbar-item margin-right-5"><?php echo $user->getInfo('username'); ?></a>
      <a href="/mail/home" class="navbar-item margin-left-5 margin-right-5 <?php if($selected == 'mail') { echo 'op-1'; } ?>">Mail</a>
      <a href="/currency" class="navbar-item margin-left-5 margin-right-5 <?php if($selected == 'currency') { echo 'op-1'; } ?>"><?php echo $user->getInfo('realBux'); ?> RealBux</a>
      <a href="/api/logout" class="navbar-item margin-left-5">Logout</a>
      </div>
  </div>
  </div>
  <div id="sub-navbar">
    <div class="container">
    <a href="/user?id=<?php echo $user->getInfo('id'); ?>" class="navbar-item margin-right-5 <?php if($selected == 'profile') { echo 'op-1'; } ?>">Profile</a>
    <a href="/character" class="navbar-item margin-left-5 margin-right-5 <?php if($selected == 'character') { echo 'op-1'; } ?>">Character</a>
      <a href="/account" class="navbar-item margin-left-5 margin-right-5 <?php if($selected == 'account') { echo 'op-1'; } ?>">Account</a>
      <a href="/inventory" class="navbar-item margin-left-5 margin-right-5 <?php if($selected == 'inventory') { echo 'op-1'; } ?>">Inventory</a>
      <a href="/settings" class="navbar-item margin-left-5 margin-right-5 <?php if($selected == 'settings') { echo 'op-1'; } ?>">Settings</a>
      <a href="/friends" class="navbar-item margin-left-5 margin-right-5 <?php if($selected == 'friends') { echo 'op-1'; } ?>">Friends</a>
      <a href="/membership" class="navbar-item margin-left-5 <?php if($selected == 'membership') { echo 'op-1'; } ?>">Membership</a>
      </div>
    </div>
<?php
  echo $alert;
  ?>