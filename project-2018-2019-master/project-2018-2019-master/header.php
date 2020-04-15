<?php
  session_start();
  require "includes/dbh.inc.php";
?>

<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="main.js"></script>    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Team Dev 3.0 project!</title>
    <link rel="stylesheet" type="text/css" href="/css/main.css">
    <link rel="stylesheet" href="/css/login.css">
    <link rel="shortcut icon" href="/css/pageicon.jpg" type="vortexlogo/ico"/>
  </head>
  <body>
    
<header class="headerlogin">
  <nav class="nav-header-main">
    <ul>
      <li><a class="header-logo" href="index.php"><img src="/images/vortex3.PNG"></a></li>
    </ul>
  </nav>
  <div class="header-login">
    <?php
      if (!isset($_SESSION['id'])) {
        echo '<form action="includes/login.inc.php" method="post">
            <input type="text" name="mailuid" placeholder="E-mail/Username">
            <input type="password" name="pwd" placeholder="Password">
            <button type="submit" name="login-submit">Login</button>
          </form>
          <a href="signup.php" class="header-signup">Signup</a>';
        }
        else if (isset($_SESSION['id'])) {
          echo '<form action="includes/logout.inc.php" method="post">
            <button type="submit" name="login-submit">Logout</button>
          </form>';
        }
        ?>
      </div>
    </header> 
</body>
</html>
<!--
    ___                                           _____      
    |__| |_  _____  ___  __|        ___ ___ __|     |     | - ___ ___
    |  | | | | | |  |_|  |_|        |_| | | |_|   |_| |_| | | |_| | |
    
              (
             ( ,)
            ). ( )
           (, )' (.
          \WWWWWWWW/
           '--..--'
              }{
              {}
   ____   _____                    _____    ______
   |   \  |     \      /               /    |    |
   |    \ |___   \    /          _____/     |    |
   |    / |       \  /               /      |    |
   |___/  |____    \/           ____/  []   |____| 
-->    