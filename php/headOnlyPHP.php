<?php
  
  require_once 'db.php';
  
  
$configStmt = $dbh->prepare("SELECT * FROM configuration WHERE id = '1'");
$configStmt->execute();

while($configRow = $configStmt->fetch(PDO::FETCH_ASSOC)) {
  
  // Maintenance check
  
  if($configRow['maintenanceEnabled'] == 1) {
    if(!isset($_COOKIE['BYPASSMAINTENANCE'])) {
    header("location: /maintenance");
      }
    }
  
  
  // Alert check
  
  if($configRow['alertEnabled'] == 1) {
    $showAlert = true;
    $alertContents = $configRow['alertContents'];
      $alert = '
        
  <div class="alert alert-' . $configRow['alertColour'] . '">
        <div class="container">                                 
    <span> ' . $alertContents . '  
      </div>  
</div>
        ';
    }
  }
  
  session_start();
  
      class usrinfo {
    public function getInfo($info) {
        global $dbh;
        
        $userInfoStmt = $dbh->prepare("SELECT * FROM users WHERE id = :uid");
        $userInfoStmt->bindParam(":uid", $_SESSION['userID']);
        $userInfoStmt->execute();
        while($usrRow = $userInfoStmt->fetch(PDO::FETCH_ASSOC)) {
          return $usrRow[$info];
          }
    }
    
}

$user = new usrinfo();
    
   
  
  if($user->getInfo("isBanned") == true) {
    header("location: /banned");
    }
  
  if($user->getInfo("isWarned") == true) {
    header('location: /warned');
      }
  
  if(is_null($_COOKIE['BARATISECURITY'])) {
    
    if(!is_null($_USER['id'])) {
      
          function gRS($length) {
    $characters = '0123456789qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM#.';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
    $randomString .= $characters[rand(0, $charactersLength - 1)];
   }
    return $randomString;
 }
      
      $newCookie = gRS(20);

    
    setcookie("BARATISECURITY", $newCookie, 99999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999*999999999999999999999, "/");
      
      $cookieStmt = $dbh->prepare("UPDATE users SET BARATISECURITY = :nc WHERE id = :uid");
    $cookieStmt->bindParam(":nc", $newCookie);
    $cookieStmt->bindParam(":uid", $user->getInfo['id']);
    $cookieStmt->execute();
      
      }
    
    }
  
  else {
    
    
    /*if(is_null($_USER['id'])) {
      
      if(isset($_COOKIE['BARATISECURITY'])) {
        
    $cookieStmt = $dbh->prepare("SELECT * FROM users WHERE BARATISECURITY = :bs");
    $cookieStmt->bindParam(":bs", $_COOKIE['BARATISECURITY']);
    $cookieStmt->execute();

   while($cookieRow = $cookieStmt->fetch(PDO::FETCH_ASSOC)) {
     
     $_SESSION['userID'] = $cookieRow['id'];
     
     header("location: /home");
     
     }
    
    }*/
        
        }
      
      
    
    if(empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === "off" || strpos($_SERVER['HTTP_HOST'], 'www') === false) {
    $location = 'https://www.' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    header('HTTP/1.1 301 Moved Permanently');
    header('location: ' . $location);
    exit;
     
}
     
    if(!is_null($user->getInfo("id"))) {
      
      if($user->getInfo("theme") == '1') {
        
        echo '<style>body{font-family:comic sans ms!important}</style>';
        
        }
      
      }
    
function clean($text) {
  
    $words = array("nigger", "hitler", "faggot", "pornhub.com", "rule34.xxx", "n1gger", "nigg3r", "n1gg3r", "h1tler", "hitl3r", "h1tl3r", "f4ggot", "fagg0t", "f4gg0t", "fagot", "f4got", "f4g0t", "pornhubdotcom", "rule34dotxxx");
    
    $lowercaseText = strtolower($text);
    
    foreach($words as $word) {
      
        if(stripos($lowercaseText, $word) !== false) {
          
            $filteredText = str_ireplace($word, '[ Content Deleted ]', $text);
          
        }
    }
    
    return $filteredText;
}

    function isFriendsWith($friend) {
      
      require_once 'db.php';
      
      $checkstmt = $dbh->prepare("SELECT * FROM friends WHERE friendsWith = :id AND friendsOf = :uid");
      $checkstmt->bindParam(":id", $friend);
      $checkstmt->bindParam(":uid", $user->getInfo("id"));
      $checkstmt->execute();
      
      if($checkstmt->rowCount() == '1') {
        return true;
        }
      else {
        return false;
        }
      }

?>