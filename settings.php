<!DOCTYPE html>
<html lang="en-GB">
  <head>
    <?php
      require_once $_SERVER['DOCUMENT_ROOT'] . '/php/head.php';
      ?>
    <title>Baratis - Settings</title>
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
   </head>
  <body>
    <?php
      $selected = 'settings';
      include $_SERVER['DOCUMENT_ROOT'] . '/php/nav.php';
      ?>
   <div class="container">
    <div id="body">
      <h2>Settings</h2>
      <div class="tabs-container">
        <div class="tab" onclick="changeTab(1)" id="tab-toggle-1">Info</div>
        <div class="tab" onclick="changeTab(2)" id="tab-toggle-2">Theme</div>
        </div>
      <div class="tab-content">
        <div id="tab-1" style="display:none">
        <span>Username: <strong><?php echo $user->getInfo("username"); ?></strong></span><br>
        <span>Email: <strong><?php if($user->getInfo("emailAddress") != '') { echo $user->getInfo("emailAddress"); } else { echo '<i>No Email Address provided</i>'; }?></strong></span><br>
          </div>
        <div id="tab-2" style="display:none">
          <a href="/api/switchTheme?theme=1"><button class="button button-blue" style="font-family:comic sans ms">Enable/Disable Comic Sans MS Theme</button></a>
        </div>
      </div>
     </div>
    </body>
  </html>