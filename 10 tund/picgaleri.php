<?php
  require("../../../config_vp2019.php");
  //require("functions_main.php");
  require("functions_user.php");
  require("functions_pic.php");
  //võtan kasutusele oma klassi
  //require("classes/Test.class.php");
  require("classes/PicUpload.class.php");
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
  
  $page = 1;
  $picCount = countPics(2);
  if(!isset($_GET["page"]) or $_GET["logout"] < 1){
	  $page = 1;
  } elseif(round($_GET["page"] - 1) * $limit >= $picCount){
	  $page = round($picCount / $limit) - 1;
  } else {
	  $page = $_GET["page"];
  }
  $limit = 5;
  $galleryHTML = readgalleryImages(2, $page, $limit);
  
  require("header.php");
?>

  <?php
    echo "<h1>" .$userName ." koolitöö leht</h1>";
  ?>
  <p>See leht on loodud koolis õppetöö raames
  ja ei sisalda tõsiseltvõetavat sisu!</p>
  <hr>
  <p>
  <a href="?logout=1">Logi välja!</a> | Tagasi <a href="home.php">avalehele</a>
  </p>
  <?php
		if($page > 1){
			echo '<a href="?page1=' .($page - 1) .'">Eeelmine leht</a> | ';
		} else {
			echo "<span>Eelmine leht</span> |";	
		}
		if($page *$limit <= $picCount){
			echo '<a href="?page1=' .($page + 1) .'">Järgmine leht</a>';
		} else {
			echo "<span>Eelmine leht</span>";
		}
  ?>
  
	<hr>
	<p>
	<a href="?page1">Eelmine leht</a> | <a href="?page2">Järgmine leht</a>
	</p>
	
	
	<h2>Pildigalerii</h2>
	<?php
		echo $palleryHTML;
	?>
	
</body>
</html>