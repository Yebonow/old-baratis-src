<!DOCTYPE html>
<html lang="en-GB">
  <head>
    <?php
      require_once $_SERVER['DOCUMENT_ROOT'] . '/php/head.php';
      ?>
    <title>Baratis - Catalog</title>
   </head>
  <body>
    <?php
            $selected = 'catalog';
      require_once $_SERVER['DOCUMENT_ROOT'] . '/php/nav.php';
      ?>
   <div class="container">
    <div id="body">
      <h2>Catalog</h2>
      <form method="post" action="/catalog">
        <label for="search">Search:</label>
        <input type="text" placeholder="Enter your search query" name="search">
        <button type="submit" class="button button-grey"><svg class="force-down-1" xmlns="http://www.w3.org/2000/svg" width="16" height="15" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
</svg>&nbsp;Search</button>
        </form>
      <br>
      <div style="display:flex;flex-wrap:wrap;margin-left:-5px;margin-right:-5px;">
      <?php
    if(isset($_POST['search'])) {
      
    $search = "%" . $_POST['search'] . "%";
    $stmt = $dbh->prepare("SELECT * FROM catalog WHERE itemName LIKE :search ORDER BY id DESC");
    $stmt->bindParam(":search", $search);
          
          } else {
            
            $stmt = $dbh->prepare("SELECT * FROM catalog ORDER BY id DESC");
            
            }
    $stmt->execute();
    $item = $stmt->fetch();
      
      $stmt->execute();
$items = $stmt->fetchAll(PDO::FETCH_ASSOC);
     
      
      foreach($items as $item) {
        
        $uStmt = $dbh->prepare("SELECT * FROM users WHERE id = :uid");
    $uStmt->bindParam(":uid", $item['itemCreator']);
    $uStmt->execute();
    $user = $uStmt->fetch();
        
        $uStmt->execute();
        
       $users = $uStmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach ($users as $user) {
          
          $creatorUsername = $user['username'];
          
          }
        
        if($item['isOnSale'] == true) {
          $specialEcho = '<span class="text-green" style="cursor:default">' . $item['price'] . ' RealBux</span>';
          }
        
        else {
          
          $specialEcho = '<span class="op-05 text-black">Off-sale</span>';
          
          }
        
        
        echo '
          <a href="/item?id=' . $item['id'] . '" style="text-decoration:none!important" class="display-inline">
          <div style="width:150px" class="margin-left-5 margin-right-5 generic-box ellipsis-overflow">
          <img src="' . $item['itemThumbnail'] . '" alt="' . $item['itemName'] . '" title="Item Thumbnail" width="150" height="100" class="rounded-corner-top-right-4 rounded-corner-top-left-4"><br>
          <span class="text-black">' . htmlspecialchars($item['itemName']) . '</span><br>
          ' . $specialEcho . '<br><span class="text-black">Creator: </span>
           <a href="/user?id=' . $item['itemCreator'] . '">' . $creatorUsername . '</a></div>';
        
        }
      
          
      ?>
        </div>
      </div>
    <?php
      require_once $_SERVER['DOCUMENT_ROOT'] . '/php/footer.php';
      ?>
    </body>
  </html>