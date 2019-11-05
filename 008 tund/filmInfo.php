<?php
	require("../../../config_vp2019.php");
	//echo $serverHost

	$userName = "Timofey Shapovalov";
	$database = "if19_timofey_sh_1";

function readALLFilms() {
	//var_dump($GLOBALS);
	//loome andme baasis filmide info
	//loome andmebaasi ühenduse
	$conn = new mysqli($GLOBALS[$serverHost], $GLOBALS$[serverUsername], $GLOBALS[$serverPassword], $GLOBALS[$database]);
	//valmistan ette pätingu
	$stmt = $conn -> prepare("SELECT pealkiri FROM film");
	echo $conn -> error;
	//$filmTitle = "tühjus";
	$filminfoHTML = null;
	$stmt -> bind_result($filmTitle);
	$stmt -> execute();
	//sain pinu (stack) täie infot, hakkan ühekaupa võtma, kuni saab
	while($stmt -> fetch()){
	  //echo "pealkirjad" .$filmTitke;
	  $filmiinfoHTML .= "<h3>" .$filmTitle ."<h3>";
	}
	//sulgen ühenduse
	$stmt -> close();
	$conn -> close();
}

readALLFilms
	
  require("header.php");
  echo "<h1>".$Username.", veebiprogrammeerimine</h1>";
 ?>
  <p>See veebileht on loodud õppetöö käigus ning ei sisalda mingit tõsiseltvõetavat sisu!</p>

  </p>
	<hr>
	<h2>eesti filmid</h2>
	<p>Praegu meie andmebaasis on järgmised filmid</p>
	<?php
	
	echo $filminfoHTML;
	?>
</body>
</html>
	