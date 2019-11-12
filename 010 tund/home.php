<?php
	require("../../../config_vp2019.php");
	//echo $serverHost
	require("functions_film.php");
	$database = "if19_timofey_sh_1";
	
	//kas on logitut
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
	
	$userName = $_SESSION["userFirstname"] ." " .$_SESSION["userLastname"];

  require ("header.php");
  
  echo "<h1>".$userName.", veebiprogrammeerimine</h1>";
 ?>
  <p>See veebileht on loodud õppetöö käigus ning ei sisalda mingit tõsiseltvõetavat sisu!</p>
	<hr>
	<h2>eesti filmid</h2>
	<p>Praegu meie andmebaasis on järgmised filmid</p>
	<hr>
	<br>
	<p><?php echo $userName; ?> logi <a href="?logout=1">välja
	</a>!</p>
	
</body>
</html>
	