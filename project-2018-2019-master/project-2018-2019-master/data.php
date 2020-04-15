
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
    <link rel="shortcut icon" href="/css/pageicon.jpg" type="vortexlogo/ico" />
  </head>
  <body>
                  <div class="boxborder3">
                  <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                  <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
                  
   <!---------------- NAVBAR ---------------->  
  <?php
    require "navbarpages.php";
  ?>
  
 <!---------------------Poll------------------->
<div id="poll">
<h3>Should we add more to the site?</h3>
<form>
Yes:
<input type="radio" name="vote" value="0" onclick="getVote(this.value)">
<br>No:
<input type="radio" name="vote" value="1" onclick="getVote(this.value)">
</form>
</div>

  <!---------------------Calendar------------------->
<?php
include 'calendar.php';

$calendar = new Calendar();

echo $calendar->show();
?>
 <!---------------------FOOTER------------------->
<div class="footer-main-div">

<div class="footer-social-icons">
    <ul class="footer-links">
        <li><img id="devlogo" src="/images/logo.PNG" width="100" height="70"></li>
    </ul>
</div>    
<div class="footer-menu-one">
    <ul class="footer-links">
        <li class="footercontent"><a href="#" class="footerlist">About</a></li>
           <li class="footercontent"><a href="#" class="footerlist">Mission</a></li>
           <li class="footercontent"><a href="#" class="footerlist">Services</a></li>
           <li class="footercontent">
              <div id="myContact" class="overlay2">
                <a href="javascript:void(0)" class="closebtn2" onclick="closeContact()">&times; </a>
                <main class="maincontact">
                  <p class="contacttitle">SEND E-MAIL</p>
                  <form class="contact-form" action="contactform.php" method="post">
                      <input class="contactinput" type="text" name="name" placeholder="Full name">
                      <input class="contactinput" type="text" name="mail" placeholder="Your e-mail">
                      <input class="contactinput" type="text" name="subject" placeholder="Subject">
                      <textarea class="textareacontact" name="message" placeholder="Message"></textarea>
                      <button class="contactbtn" type="submit" name="submit">SEND MAIL</button>
                  </form>
              </main>
        </div>
        <span style="font-size:30px;cursor:pointer" onclick="openContact()"> Send a comment</span> </li>
</ul>
</div>
<div class="footer-menu-two">
    <ul class="footer-links">
        <li class="footercontent"><a href="#" class="footerlist">Phone Number: 731-666-7777</a></li>
           <li class="footercontent"></li>
           <li class="footercontent"><a href="#" class="footerlist">Email: carshop@gmail.com</a></li>
           <li class="footercontent"></li>      
     </ul>
</div>
</div>
<div class="footer-bottom">
    <p class="footerparagragh">|  Dev 3.0  |</p>
</div>
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