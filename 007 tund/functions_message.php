<?php
function storeMessage($myMessage){
	$notice = null;
	$conn = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
	$stmt = $conn->prepare("INSERT INTO vpmsg (userid, message) VALUES (?,?,)");
	echo $conn->error;
	$stmt->bind_param("is", $S_SESSION["userId"], $myMessage);
	if($stmt->execute()){
		$notice = "Sõnum salvestatud"
	} else {
		$notice = "Sõnumi salvestamisel tekkis tõrge: " .$stmt->error;
	}
	$stmt -> close();
	$conn -> close();
	return $notice;
}

function readMyMessages(){
	$messagesHTML = "";
	$limit = 5;
	$conn = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
	$stmt = $conn ->prepare("SELECT message, created FROM vpmsg WHERE userid = ? AND deleted IS NULL ORDER BY created DESC LIMIT 2");
	echo $conn -> error;
	$stmt -> bind_param("ii", $_SESSION["userId"], $limit);
	$stmt -> bind _result($messageFromDb, $createdFromDb);
	$stmt -> execute();
	while($stmt -> fetch()){
		$messagesHTML .= "<li>" .$messageFromDb ." Lisatud: " .$createdFromDb ."</li> \n";
	}
	if(!empty($messagesHTML)){
		$messagesHTML = "<ul> \n" .$messagesHTML ."</ul> \n";
	} else {
		$messagesHTML = "<p>Sõnuit pole!</p> \n";
		
	}
	
	$stmt -> close();
	$conn -> close();
	return $messagesHTML;
}