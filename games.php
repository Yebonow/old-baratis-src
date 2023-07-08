<!DOCTYPE html>
<html lang="en-GB">
  <head>
    <?php
      require_once $_SERVER['DOCUMENT_ROOT'] . '/php/head.php';
      ?>
    <title>Baratis - Games</title>
   </head>
  <body>
    <?php
            $selected = 'games';
      require_once $_SERVER['DOCUMENT_ROOT'] . '/php/nav.php';
      ?>
   <div class="container">
    <div id="body">
      <h2>Games</h2>
      <form method="post" action="/games" class="display-inline">
        <label for="search">Search:</label>
        <input type="text" placeholder="Enter your search query" name="search">
        <button type="submit" class="button button-grey"><svg class="force-down-1" xmlns="http://www.w3.org/2000/svg" width="16" height="15" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
</svg>&nbsp;Search</button>
        </form>
      <a href="/add?type=game" class="margin-left-5 force-left-2"><button class="button button-blue"><svg class="force-down-2" style="margin-bottom:-6px;margin-top:-3px;margin-left:-3px;margin-right:-3px" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
  <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
</svg>&nbsp;Add</button></a>
      <br>
      <div style="display:flex;flex-wrap:wrap">
      <?php
    if(isset($_POST['search'])) {
      
    $search = "%" . $_POST['search'] . "%";
    $stmt = $dbh->prepare("SELECT * FROM games WHERE title LIKE :search ORDER BY id DESC");
    $stmt->bindParam(":search", $search);
          
          } else {
            
            $stmt = $dbh->prepare("SELECT * FROM games ORDER BY id DESC");
            
            }
    $stmt->execute();
    $item = $stmt->fetch();
      
      $stmt->execute();
$games = $stmt->fetchAll(PDO::FETCH_ASSOC);
     
      
      foreach ($games as $game) {
        
        $uStmt = $dbh->prepare("SELECT * FROM users WHERE id = :uid");
    $uStmt->bindParam(":uid", $item['itemCreator']);
    $uStmt->execute();
    $user = $uStmt->fetch();
        
        $uStmt->execute();
        
       $users = $uStmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach ($users as $user) {
          
          $creatorUsername = $user['username'];
          
          }
        
        if($game['isOnSale'] == true) {
          $specialEcho = '<span class="text-green" style="cursor:default">' . $game['playersOnline'] . ' Players</span>';
          }
        
        else {
          $specialEcho = '<span class="op-05 text-black">Offline</span>';
          }
        
        
        echo '
          <a href="/game?id=' . $game['id'] . '" style="text-decoration:none!important" class="display-inline">
          <div style="width:150px" class="margin-left-5 margin-right-5 generic-box ellipsis-overflow">
          <img src="' . $game['itemThumbnail'] . '" alt="' . $game['itemName'] . '" title="Game Thumbnail" width="150" height="100" class="rounded-corner-top-right-4 rounded-corner-top-left-4"><br>
          <span class="text-black">' . $item['itemName'] . '</span><br>
          ' . $specialEcho . '<br><span class="text-black">Creator: </span>
           <a href="/user?id=' . $game['itemCreator'] . '">' . $creatorUsername . '</a></div>';
        
        }
      
          
      ?>
        </div>
    <?php
      require_once $_SERVER['DOCUMENT_ROOT'] . '/php/footer.php';
      ?>
    </body>
  </html>