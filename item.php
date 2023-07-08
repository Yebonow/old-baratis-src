<?php
  $id = (int)$_GET['id'];
  
  require_once $_SERVER['DOCUMENT_ROOT'] . '/php/head.php';
  $stmt = $dbh->prepare("SELECT * FROM catalog WHERE id = :iid");
  $stmt->bindParam(":iid", $id);
  $stmt->execute();
  
  $item = $stmt->fetchAll(PDO::FETCH_ASSOC);
  
  require_once $_SERVER['DOCUMENT_ROOT'] . '/php/headOnlyPHP.php';
  $stmt2 = $dbh->prepare("SELECT * FROM users WHERE id = :uid");
  $stmt2->bindParam(":uid", $item[0]['itemCreator']);
  $stmt2->execute();
  
  $creator = $stmt2->fetchAll(PDO::FETCH_ASSOC);
  
  $stmt3 = $dbh->prepare("SELECT * FROM ownedItems WHERE whatOwned = :wo AND ownedBy = :uid");
  $stmt3->bindParam(":wo", $id);
  $stmt3->bindParam(":uid", $user->getInfo("id"));
  $stmt3->execute();
  
if($stmt3->rowCount() == '1') {
  $itemOwned = true;
} else {
  $itemOwned = false;
}
  
  ?>
<!DOCTYPE html>
<html lang="en-GB">
  <head>
    <?php
      require_once $_SERVER['DOCUMENT_ROOT'] . '/php/head.php';
      ?>
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        
  function checkTabStatus() {
    var tabElements = document.querySelectorAll('[id^="tab-"]');
    var tabMessage = document.getElementById("tab-message");

    var isTabOpen = false;
    for (let i = 0; i < tabElements.length; i++) {
      
      if (tabElements[i].style.display === "block") {
        
        isTabOpen = true;
        break;
          
      }
      
    }

    if (!isTabOpen) {
      
      var tabContent = document.getElementsByClassName("tab-content")[0];
      if (!tabMessage) {
        
        var messageSpan = document.createElement("span");
        messageSpan.id = "tab-message";
        messageSpan.innerHTML = "Please select a tab";
        tabContent.appendChild(messageSpan);
        
      }
      
    } else {
      
      if (tabMessage) {
        
        tabMessage.parentNode.removeChild(tabMessage);
        
      }
    }
  }

  var tabToggles = document.getElementsByClassName("tab");
  for (let i = 0; i < tabToggles.length; i++) {
    tabToggles[i].addEventListener("click", function () {
      
      checkTabStatus();
      
    });
    
  }

  checkTabStatus();
});

      </script>
    <title>Baratis - Item</title>
    <style>
      .box-content .generic-box p{margin:10px 0px 0px 0px}
      </style>
    </head>
  <body>
    <?php
  $selected = 'catalog';
  require_once $_SERVER['DOCUMENT_ROOT'] . '/php/nav.php';
  if(is_null($id)) {
    die('<center class="text-red">No item ID entered</center>');
    exit;
    }
  ?>
    <?php
  $cooldownCheck = $_GET['cooldown'];
  
  if($cooldownCheck == 'cooldown') {
    echo '
      <div class="alert alert-red"><div class="container"><strong>You are performing too many actions</strong> - please wait, then try again.</div></div>';
    }
  ?>
    <div class="container">
      <div id="body">
        <div class="box-container">
          <div class="box-header">
            <center>
              Baratis <?php echo $item[0]['itemType']; ?>
              </center>
            </div>
          <div class="box-content">
            <div style="position:relative;float:left" class="generic-box">
              <img src="<?php echo $item[0]['itemThumbnail']; ?>" alt="<?php echo $item[0]['itemName']; ?>" title="Item Thumbnail" height="333" width="500">
              </div>
            <div style="position:relative;float:right" class="generic-box">
              <strong><?php echo htmlspecialchars($item[0]['itemName']); ?></strong>
              <br>
              <div class="margin-top-10">
              <span>Creator: <strong><a href="/user?id=<?php echo $item[0]['itemCreator']; ?>"><?php echo $creator[0]['username']; ?></a></strong></span>
              <br>
              <span>Price: <strong class="text-green"><?php echo $item[0]['price']; ?> RealBux</strong></span>
              </div>
              <div class="margin-top-10">
              <span>Item Category: <strong><a href="/catalog?filterby=<?php echo $item[0]['itemCategory']; ?>"><?php echo $item[0]['itemCategory']; ?></a></strong></span>
              <br>
              <span>Description:</span>
              <div class="generic-box">
                <?php if(!is_null($item[0]['itemDescription']) || $item[0]['itemDescription'] != '') { 
  echo htmlspecialchars($item[0]['itemDescription']);
 } else {
  echo '<i>No description provided</i>';
  } ?>
                </div>
                <?php
  if($item[0]['isOnSale'] == 0) {
    echo '<p>This item is off-sale</p>';
    }
  else {
  if($itemOwned == false) {
    echo '<p><a href="javascript:window.open(\'https://www.baratis.tk/PurchaseConfirmation?item=' . $id . '\', \'Purchase Confirmation\', \'width=800,height=600\');window.location.reload();"><button class="button button-green">Buy with RealBux</button></a></p>';
    } else {
      echo '<p>You already own this item</p><p class="margin-top-5"><a href="javascript:window.open(\'https://www.baratis.tk/RemoveItemConfirmation?item=' . $id . '\', \'Removal Confirmation\', \'width=800,height=600\');window.location.reload();"><button class="button button-red"><svg class="force-down-2" xmlns="http://www.w3.org/2000/svg" width="18" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
  <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
</svg>&nbsp;Remove item from inventory</button></a>';
      }
    }
  ?>
               
                <?php
  if($user->getInfo("id") == $item[0]['itemCreator']) {
    echo '<div class="margin-top-5"><a href="/edit?item=' . $id . '"><button class="button button-blue"><svg class="force-down-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
</svg>&nbsp;Edit Item</button></a></div>';
    }
  ?>
              </div>
              
                </div>
              <div style="clear:both"></div>
                </div>
          <br>
          <div class="tabs-container">
        <div class="tab" onclick="changeTab(1)" id="tab-toggle-1">Comments</div>
        <div class="tab" onclick="changeTab(2)" id="tab-toggle-2">Report</div>
        </div>
      <div class="tab-content">
        <div id="tab-1" style="display:none">
          <?php
  require_once 'php/headOnlyPHP.php';
  
  $stmt = $dbh->prepare("SELECT * FROM itemComments WHERE commentingOn = :iid");
  $stmt->bindParam(":iid", $_GET['id']);
  $stmt->execute();
  
  $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);
  
  foreach($comments as $comment) {
    
    $stmt2 = $dbh->prepare("SELECT * FROM users WHERE id = :uid");
    $stmt2->bindParam(":uid", $comment['commentor']);
    $stmt2->execute();
    
    $commentor = $stmt2->fetchAll(PDO::FETCH_ASSOC);
    
    echo '<div style="margin-bottom:1px solid #5a5a5a; padding: 10px;">
      <a href="/user?id=' . $commentor[0]['id'] . '" class="text-black" style="text-decoration:none!important"><img src="/avatar.php?id=' . $commentor[0]['id'] . '" alt="' . $commentor[0]['username'] . '" title="Character" height="80"></a><span style="vertical-align:top"><strong>' . $commentor[0]['username'] . '</strong> said: <q>' . $comment['comment'] . '</q><br><span style="vertical-align:middle"><a href="/reportComment?comment=' . $comment['id'] . '"><button class="button button-red">Report Abuse</button></a><span class="op-05 float-right">' . date('M j Y', strtotime($comment['added'])) . '</span><div style="clear:both"></div></span>
                                                                                                                                                                                                                                                                                                                                                                                                                                     
 </div> ';
    }
  
  if(!$comments) {
    echo '<center><p class="margin-top-10 margin-bottom-10">No comments</p></center>';
    }
  
  ?>
          </div>
        <div id="tab-2" style="display:none">
          <embed src="/itemReport?id=<?php echo $id; ?>" style="width:100%;height:30%;"></embed>
      </div>
                </div>
      </div>
     </div>
    </body>
  </html>