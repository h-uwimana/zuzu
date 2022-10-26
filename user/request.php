<?php
	session_start();
	include_once "../db.php";
	$email = $_SESSION["email"];
	$userId = $chat->prepare("SELECT `id` FROM `service` WHERE `email` = :email");
	$userId->bindValue(":email", $email);
	$userId->execute();
	$id = $userId->fetch(PDO::FETCH_ASSOC);
	
	echo $id["id"];