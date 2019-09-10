<?php

	$username = "Timofey Shapovalov";
	$fullTimeNow = date("d.m.Y H:i:s");
	$houtNow = date ("H");
	$partOhDay = "hägune aeg";
	
	if($hourNow < 8) {
		$partOfDay = "hommik";
		
  }
?>


<!DOCTYPE html>
<html>

<head>
<meta charset="uft-8">

<title> 
  <?php
	echo $username; 
  ?>
  veebiprogrameerimine </title>
</head>	
<body>
  <?php
	echo "<h1>".$username.", veebiprogrammeerimine</h1>";
  ?>
  <h1>Andrus Rinde, veebiprogrammeerimine</h1>
  <p>See veebileht on loodud õppetöö käigus ning ei sisalda mingit tõsiseltvõetavat sisu!</p>
	<hr>
	<?php
	echo "<p>Lehe avamise hetkel oli aeg: " .$fullTimeNow .", " .$partOfDay . ".</p>";
	?>
</body>
</html>
	