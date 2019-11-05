<?php
	require("../../../config_vp2019.php");
	//echo $serverHost
	require("functions_film.php");

	$userName = "Timofey Shapovalov";
	$database = "if19_timofey_sh_1";

	//var_dump($_POST);
	if(isset($_POST["submitFilm"])) {
	storeFilmInfo($_POST["filmTitle"], $_POST["filmYear"], $_POST["filmDuration"], $_POST["filmGener"], $_POST["filmStudio"], $_POST["filmDirector"]);

	//$filmInfoHTML = readALLFilms();
	}
	
  require ("header.php");
  echo "<h1>".$userName.", veebiprogrammeerimine</h1>";
	
 ?>
  <p>See veebileht on loodud õppetöö käigus ning ei sisalda mingit tõsiseltvõetavat sisu!</p>

  </p>
	<hr>
	<h2>Eesti filmid</h2>
	<p>Lisa uus film andmebaasi</p>
	<hr>
	<form method="POST">
		<label>kirjuta filmi pealkiri</label>
		<input type="text" name="filmTitle">
		<br>
		<br>
		<label>Filmi tootmis aasta: </label>
		<input type="number" min="1912" max="2019" value="2019" name="filmYear">
		<br>
		<br>
		<label>Filmi kestus: </label>
		<input type="number" min="1" max="300" value="80" name="filmDuration">
		<br>
		<br>
		<label>Filmi žanr: </label>
		<input type="text" name="filmGener">
		<br>
		<br>
		<label>Filmi tootja: </label>
		<input type="text" name="filmStudio">
		<br>
		<br>
		<label>Filmi lavastaja: </label>
		<input type="text" name="filmDirector">
		<br>
		<br>
		<input type="submit" value="Talleta filmi info" name="submitFilm">
	</form>
</body>
</html>
	