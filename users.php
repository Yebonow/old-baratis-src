<!DOCTYPE html>
<html lang="en-GB">
  <head>
    <?php
      require_once $_SERVER['DOCUMENT_ROOT'] . '/php/head.php';
      ?>
    <title>Baratis - Users</title>
   </head>
  <body>
    <?php
            $selected = 'users';
      require_once $_SERVER['DOCUMENT_ROOT'] . '/php/nav.php';
      ?>
   <div class="container">
    <div id="body">
      <h2>Users</h2>
      <form method="post" action="/users">
        <label for="search">Search:</label>
        <input type="text" placeholder="Enter your search query" name="search">
        <button type="submit" class="button button-grey"><svg class="force-down-1" xmlns="http://www.w3.org/2000/svg" width="16" height="15" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
</svg>&nbsp;Search</button>
        </form>
      <br>

      <?php
        
        if(isset($_POST['search'])) {
      
    $search = "%" . $_POST['search'] . "%";
    $stmt = $dbh->prepare("SELECT * FROM users WHERE username LIKE :search ORDER BY id DESC");
    $stmt->bindParam(":search", $search);
          
          } else {
            
            $stmt = $dbh->prepare("SELECT * FROM users ORDER BY id DESC");
            
            }
      
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
      
      if(!$users) {
        echo '<span class="text-red display-block">No results</span><a href="users">Clear search query</a>';
        } else {

foreach ($users as $user) {
  
  if(!is_null($user['currentStatus'])) {
    
    $specialEcho = '<q>' . htmlspecialchars($user['currentStatus']) . '</q>';
    
    }
  
  else {
    
    $specialEcho = '';
    
    }
  
    echo '<a href="/user?id=' . $user['id'] . '" class="text-black" style="text-decoration:none"><div class="generic-box margin-bottom-5 rounded-edges" style="min-height:128px">
      <div class="float-left">
      <img src="avatar.php?id=' . $user['id'] . '" alt=" ' . $user['username'] . '\'s character" title="' . $user['username'] . '" height="128">
      </div>
      ' . $user['username'] . '<br>' .  $specialEcho . '
      
                </div></a>';
}
        }
      
      ?>
    <?php
      require_once $_SERVER['DOCUMENT_ROOT'] . '/php/footer.php';
      ?>
    </body>
  </html>