<?php
	require("../../../config_vp2019.php");
	//echo $serverHost
	require("functions_film.php");

	$userName = "Timofey Shapovalov";
	$database = "if19_timofey_sh_1";

	$filmInfoHTML = readALLFilms();
  require ("header.php");
  echo "<h1>".$userName.", veebiprogrammeerimine</h1>";
 ?>
  <p>See veebileht on loodud õppetöö käigus ning ei sisalda mingit tõsiseltvõetavat sisu!</p>

  </p>
	<hr>
	<h2>eesti filmid</h2>
	<p>Praegu meie andmebaasis on järgmised filmid</p>
	<?php
	
	echo $filmInfoHTML;
	?>
</body>
</html>
	