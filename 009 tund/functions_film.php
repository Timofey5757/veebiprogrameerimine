<?php
function readALLFilms() {
	//var_dump($GLOBALS);
	//loome andme baasis filmide info
	//loome andmebaasi ühenduse
	$conn = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
	//valmistan ette pätingu
	$stmt = $conn -> prepare("SELECT pealkiri,aasta FROM film");
	echo $conn -> error;
	//$filmTitle = "tühjus";
	$filmInfoHTML = null;
	$stmt -> bind_result($filmTitle, $filmYear);
	$stmt -> execute();
	//sain pinu (stack) täie infot, hakkan ühekaupa võtma, kuni saab
	while($stmt -> fetch()){
	  //echo "pealkirjad" .$filmTitke;
	  $filmInfoHTML .= "<h3>" .$filmTitle ."</h3>";
	  $filmInfoHTML .= "<p>" .$filmYear ."</p>";
	}
	//sulgen ühenduse
	$stmt -> close();
	$conn -> close();
	return $filmInfoHTML;
	
}

function storeFilmInfo($filmTitle, $filmTYear, $filmDuration, $filmGener, $filmStudio, $filmDirector) {
		$conn = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
		$stmt = $conn -> prepare("INSERT INTO film (pealkiri, aasta, kestus, zanr, tootja, lavastaja) VALUES(?,?,?,?,?,?)");
		echo $conn -> error;
		//andmetüübid: s - string i - integer d - decimal
		$stmt -> bind_param("siisss", $filmTitle, $filmYear, $filmDuration, $filmGener, $filmStudio, $filmDirector);
		$stmt -> execute();
	
		$stmt -> close();
		$conn -> close();
}
?>