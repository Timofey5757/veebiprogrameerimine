<?php
require("../../../config_vp2019.php");
  require("functions_main.php");
  require("functions_user.php");
  require("functions_messsage.php");
  $database = "if19_timofey_sh_1";
  
  //kui pole sisseloginud
  if(!isset($_SESSION["userId"])){
	  //siis jõuga sisselogimise lehele
	  header("Location: page.php");
	  exit();
  }
  
  //väljalogimine
  if(isset($_GET["logout"])){
	  session_destroy();
	  header("Location: page.php");
	  exit();
  }
  
  $userName = $_SESSION["userFirstname"] ." " .$_SESSION["userLastname"];
  
  $notice = null;
  $myMessage = null;
  
  if(isset($_POST["submitMessage"])){
	$myMessage = test_imput($_POST["message"]);
	if(!empty($myMessage)){
		$notice = storeMessage($myMessage);
	} else {
		$notice = "Tühja sõnumi ei salvestata!";
	}
  }
  
  $messageHTML = readMyMessages();
  
  require("header.php");
?>


<body>
  <?php
    echo "<h1>" .$userName ." koolitöö leht</h1>";
  ?>
  <p>See leht on loodud koolis õppetöö raames
  ja ei sisalda tõsiseltvõetavat sisu!</p>
  <hr>
  <p><a href="?logout=1">Logi välja!</a> | <a href="userprofile.php">Kasutajaprofiil</a></p>
  <p>Tagasi <a href="home.php">avalehele</a></p>
  
  <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	  <label>Minu kirjeldus</label><br>
	  <textarea rows="5" cols="51" name="description" placeholder="Lisa siia oma tutvustus ..."><?php echo $myDescription; ?>><br>
	  <input name="submitProfile" type="submit" value="Salvesta profiil"><span><?php echo $notice; ?></span>
	</form>
	<hr>
	<h2>senised sõnumid<h2>
	<?php
		echo messagesHTML
	?>	
  
</body>
</html>