<!DOCTYPE html>
<html lang="en-GB">
  <head>
    <?php
      require_once $_SERVER['DOCUMENT_ROOT'] . '/php/head.php';
      ?>
    <title>Baratis - Inventory</title>
   </head>
  <body>
    <?php
      $selected = 'inventory';
      include $_SERVER['DOCUMENT_ROOT'] . '/php/nav.php';
      ?>
   <div class="container">
    <div id="body">
      <h2>Inventory</h2>
            <form method="post" action="/inventory" style="display:inline-block;margin-bottom:10px">
        <label for="search">Search:</label>
        <input type="text" placeholder="Enter your search query" name="search">
        <input type="submit" value="Search" class="button button-grey">
        </form>
      <div class="float-right">
        <a href="/inventory?type=Hat" class="margin-right-5"><button class="button button-blue">Hat</button></a><a href="/inventory?type=T-Shirt" class="margin-right-5"><button class="button button-blue">T-Shirt</button></a><a href="/inventory" class="margin-right-5"><button class="button button-grey">None</button></a>
        </div>
      <br>
      <div style="display:flex;flex-wrap:wrap;margin-left:-5px;margin-right:-5px;">
        <?php
      
      $type = $_GET['type'];
      
$stmt = $dbh->prepare("SELECT * FROM ownedItems WHERE ownedBy = :uid ORDER BY id DESC");
        
      
          
          $uid = $user->getInfo("id");
$stmt->bindParam(":uid", $uid);
$stmt->execute();

$ownedItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach($ownedItems as $item) {
    $itemId = $item['whatOwned'];

    $stmt2 = $dbh->prepare("SELECT * FROM catalog WHERE id = :iid");
    $stmt2->bindParam(":iid", $itemId);
    $stmt2->execute();

    $catalogItem = $stmt2->fetch(PDO::FETCH_ASSOC);
    $itemName = $catalogItem['itemName'];
    $creatorId = $catalogItem['itemCreator'];

    $stmt3 = $dbh->prepare("SELECT * FROM users WHERE id = :cid");
    $stmt3->bindParam(":cid", $creatorId);
    $stmt3->execute();

    $creator = $stmt3->fetch(PDO::FETCH_ASSOC);
    $creatorUsername = $creator['username'];
  
  if($catalogItem['isOnSale'] == false) {
    $specialEcho = '<span class="op-05 text-black">Off-sale</span>';
    }
  else {
    $specialEcho = '<span class="text-green">' . $catalogItem['price'] . ' RealBux</span>';
    }
  
  if(!is_null($type)) {
    if($catalogItem['itemType'] == $type) {
        
        
        echo '
          <a href="/item?id=' . $catalogItem['id'] . '" style="text-decoration:none!important" class="display-inline">
          <div style="width:150px" class="margin-left-5 margin-right-5 generic-box">
          <img src="' . $catalogItem['itemThumbnail'] . '" alt="' . $catalogItem['itemName'] . '" title="Item Thumbnail" width="150" height="100" class="rounded-corner-top-right-4 rounded-corner-top-left-4"><br>
          <span class="text-black">' . $catalogItem['itemName'] . '</span><br>
          ' . $specialEcho . '<br><span class="text-black">Creator: </span>
           <a href="/user?id=' . $item['itemCreator'] . '">' . $creatorUsername . '</a></div>';
        
        } 
  } else {
          echo '
          <a href="/item?id=' . $catalogItem['id'] . '" style="text-decoration:none!important" class="display-inline">
          <div style="width:150px" class="margin-left-5 margin-right-5 generic-box">
          <img src="' . $catalogItem['itemThumbnail'] . '" alt="' . $catalogItem['itemName'] . '" title="Item Thumbnail" width="150" height="100" class="rounded-corner-top-right-4 rounded-corner-top-left-4"><br>
          <span class="text-black">' . $catalogItem['itemName'] . '</span><br>
          ' . $specialEcho . '<br><span class="text-black">Creator: </span>
           <a href="/user?id=' . $item['itemCreator'] . '">' . $creatorUsername . '</a></div>';
    }
          }
                
                
      
          
      ?>
      </div>
     </div>
    </body>
  </html>