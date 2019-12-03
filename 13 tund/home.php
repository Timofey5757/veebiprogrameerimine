<?php
  require("../../../config_vp2019.php");
  require("functions_user.php");
  $database = "if19_timofey_sh_1";
  
   //sessioonihaldus osa
  require("classes/Session.class.php");
  SessionManager::sessionStart("vp", 0, "/", "greeny.cs.tlu.ee");
  
  //kontrollime, kas on sisse logitud
  if(!isset($_SESSION["userId"])){
	  header("Location: page.php");
	  exit();
  }
  
  //logime välja
  if(isset($_GET["logout"])){
	  session_destroy();
	  header("Location: page.php");
	  exit();
  }
  
  //tegeleme küpsistega (cookies)
  //setcookie peab olema enne <html> elementi!
  //nimi [väärtus, aegumine, path ehk kataloog, domeen (domain), secure ehk kas HTTPS, http-only] kas üle http ehk üle veebi
  setcookie("vpusername", $_SESSION["userFirstname"] ." " .$_SESSION["userLastname"], time() + (86400 * 31), "/" "greeny.cs.tlu.ee", isset($_SERVER["HTTPS"]), true);
  if(isset($_COOKIE["vpusername"])){
	  echo "Leiti kupsis: " .$_COOKIE["vpusername"];
  } else {
	  echo "Küpsiseid ei leitud!";
  }
  //count ($_COOKIE)
  
  $userName = $_SESSION["userFirstname"] ." " .$_SESSION["userLastname"];
    
  require("header.php");
	
  echo "<h1>" .$userName .", veebiprogrammeerimine</h1>";
  ?>
  <p>See veebileht on loodud õppetöö käigus ning ei sisalda mingit tõsiseltvõetavat sisu!</p>
  <hr>
  <br>
  <p><?php echo $userName; ?> | Logi <a href="?logout=1">välja</a>!</p>
  <ul>
    <li><a href="userprofile.php">Kasutajaprofiil</a></li>
	<li><a href="messages.php">Sõnumid</a></li>
	<li><a href="showfilminfo.php">Filmid</a></li>
	<li><a href="picupload.php">Piltide üleslaadimine</a></li>
  </ul>
  
</body>
</html>