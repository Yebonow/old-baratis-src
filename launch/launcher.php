<!DOCTYPE html>
<html>
  <?php
    $launchArgs = $_GET['args'];
    ?>
  <head>
    <script>
      window.onload = function() {
        

var isIDE_ = 2;

function isIDE()
{
  if (isIDE_==2)
  {
    try
    {
      isIDE_ = window.external.IsRobloxIDE;
    }
    catch (ex)
    {
      isIDE_ = false;
    }
  }
  return isIDE_;
}

function visit(visitUrl)
{
  if (checkRobloxInstall()) {
    var app = new ActiveXObject("Roblox.App");
    var workspace = app.CreateGame(2);  // Window
      
    workspace.ExecUrlScript(visitUrl);
      
    workspace = app.NullDispatch;
    app = app.NullDispatch;
  }
}

function edit(editScriptUrl)
{
  if (checkRobloxInstall()) {
    var workspace = window.external.NewWorkspace();  // IDE
    workspace.ExecUrlScript(editScriptUrl);
  }
}

    }
  </script>
    </head>
  <body>
    <h2>Launching, please be patient.</h2>
    </body>
  </html>