<?php
	session_start();
	include_once "db.php";
	$klant = $chat->prepare("INSERT INTO `klant` ( `naam` ) VALUES (:naam)");
	echo "hello";
	
	$chat = filter_input(INPUT_POST, "chat", FILTER_SANITIZE_STRING);
	if(isset($_POST["chat"])) {
	
//		de eerste keer om een naam te vragen
		if (!isset($_SESSION["chatname"])) {
			$_SESSION["chatname"] = $chat;
			
			$klant->bindValue(":naam", $chat);
			
			try {
				$klant->execute();
			} catch (PDOException $e) {
				echo $sql . "<br>" . $e->getMessage();
			}
			
			
			exit();
		}
	}
	
	
	
