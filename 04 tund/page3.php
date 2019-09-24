<?php

	$username = "Timofey Shapovalov";
	
	$photoDir ="../photos/";
	$photoTypes = ["image/jepg", "image/png"];
	
	$fullTimeNow = date("d.m.Y H:i:s");
	$hourNow = date ("H");
	$partOfDay = "hägune aeg";
	
	if($hourNow < 8) {
		$partOfDay = "hommik";
    }
	
	if($hourNow > 12) {
		$partOfDay = "Päev";	
    }
	
	if($hourNow > 18) {
		$partOfDay = "Õhtu";	
    }
	//info semestri kulgemise kohta
	$semesterStart = new DateTime("2019-9-2");
	$semesterEnd = new DateTime("2019-12-13");
	$semesterDuration = $semesterStart -> diff($semesterEnd);
	$today = new DateTime("now");
	$semesterElapsed = $semesterStart -> diff($today);
	//echo $semesterStart;
	//var_dump ($semesterStart);
	//<p>semester on täies hoos:
	//<meter> min="0" max="112" value="16">13%</meter>
	//</p>
	$semesterInfoHTML = null;
	if($semesterElapsed -> format("%r%a") >= 0) {
		$semesterInfoHTML = "<p>semester on täies hoos:";
		$semesterInfoHTML .= '<meter> min="0" max="112" value="16"' .$semesterDuration -> format("%r%a") .'">';
		$semesterInfoHTML .= 'value="' .$semesterElapsed -> format("%r%a") .'">';
		$semesterInfoHTML .= round($semesterElapsed -> format("%r%a") / $semesterDuration -> format("%r%a") * 100, 1) ."%";
		$semesterInfoHTML .= "</meter> </p>";
	}
	
	//foto näitamine lehel
	$fileList = array_slice(scandir($photoDir), 2);
	//var_dump($fileList, 2);
	$photoList = [];
	foreach ($fileList as $file);{
		$fileInfo = getImagesize($photoDir .$file);
		//var_dump($fileInfo);
		if(in_array($fileInfo["mime"], $photoTypes)){
			array_push($photoList, $file);
		}
	}
	
	//$photoList = ["tlu_terra_600x400_1.jpg", "tlu_terra_600x400_2.jpg", "tlu_terra_600x400_3.jpg"]; //array ehk massiv
	//var_dump($photoList);
	$photoCount = count($photoList);
	//echo $photoCount;
	$photoNum = mt_rand(0, $photoCount -1);
	//echo $photoList[$photoNum];
	//<img src="../photos/tlu_terra_600x400_1.jpg" alt="TLÜ Terra õppehoone">
	$randomImgHTML = '<img src="' .$photoDir . $photoList[$photoNum].'" alt=juhuslik foto">';

require("header.php");

	echo "<h1>".$username.", veebiprogrammeerimine</h1>";
  ?>
  <p>See veebileht on loodud õppetöö käigus ning ei sisalda mingit tõsiseltvõetavat sisu!</p>
 	<?php
	echo $semesterInfoHTML;
	?>
  </p>
	<hr>
	<?php
	echo "<p>Lehe avamise hetkel oli aeg: " .$fullTimeNow .", " .$partOfDay . "</p>";
	echo $randomImgHTML;
	?>
</body>
</html>
	