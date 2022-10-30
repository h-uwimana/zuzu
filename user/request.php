<?php
	session_start();
	include_once "../db.php";
	
	$getKlant = $chat->prepare("SELECT `id` , `naam` FROM `klant` WHERE `chat` = 0");
	$userId = $chat->prepare("SELECT `id` FROM `service` WHERE `email` = :email");
	$klantUpdate = $chat->prepare("UPDATE `klant` SET `chat` = 1 WHERE `id` = :id");
	
	
	
	$email = $_SESSION["email"];
	
	$userId->bindValue(":email", $email);
	$userId->execute();
	$id = $userId->fetch(PDO::FETCH_ASSOC);
	
//	echo $id["id"];
//	om de berichten in de sidebar te krijgen
	if(isset($_POST["chatInterval"])){
		$getKlant->execute();
		$klanten = $getKlant->fetch(PDO::FETCH_ASSOC);
		
//		var_dump($klanten);
		$klant = array("naam" => $klanten["naam"], "id" => $klanten["id"]);
		echo json_encode($klant);
		$klantUpdate->bindValue(":id", $klanten["id"] );
		$klantUpdate->execute();
	}
	
	if(isset($_POST["berichtInterval"])){
		
		echo "hello";
	}
	
	
