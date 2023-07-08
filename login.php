<!DOCTYPE html>
<html lang="en-GB">
  <head>
    <?php
      require_once $_SERVER['DOCUMENT_ROOT'] . '/php/head.php';
      ?>
    
    <?php
      
if(isset($_POST['submit'])) {
  
    $username = $_POST['username'];
    $password = $_POST['password'];
  
    $stmt = $dbh->prepare("SELECT * FROM users WHERE username = :usn");
    $stmt->bindParam(":usn", $username);
    $stmt->execute();
    $user = $stmt->fetch();

    if($user && password_verify($password, $user['password'])) {
        $_SESSION['userID'] = $user['id'];
        header('location: /home');
    } else {
        $error = 'Incorrect username or password';
    }
}
      
      if(!is_null($user->getInfo('id'))) {
        header('location: /home');
        }
      
?>
    <title>Login</title>
   </head>
  <body>
    <div class="container">
      <center>
      <h2>Login</h2>
      <form method="post" action="login">
        <input type="text" class="margin-bottom-5 display-block" placeholder="Username" name="username">
        <input type="password" class="margin-bottom-5 display-block" placeholder="Password" name="password">
        <input type="submit" class="margin-top-5 button button-blue display-block" value="Login" name="submit">
        </form>
        <?php
      echo '<span class="text-red padding-top-5">' . $error . '</span>';
      ?>
        <br>
        <i>Don't have an account? <a href="/signup">Signup</a>!</i>
        </center>
    </body>
  </html>