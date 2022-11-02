<?php
	session_start();
	include_once "db.php";
//	alle queries staan boven, zodat ik ze kan gebruiken wanneer ik ze nodig heb
	$klant = $chat->prepare("INSERT INTO `klant` ( `naam` ) VALUES (:naam)");
	$getKlant = $chat->prepare("SELECT `id` FROM `klant` WHERE `chat` = 0");
	$klantId = $chat->prepare("SELECT `id` FROM `klant` WHERE `naam` = :naam");
	$klantUpdate = $chat->prepare("UPDATE `klant` SET `chat` = 1 WHERE `id` = :id");
	
	$bericht =  $chat->prepare("INSERT INTO `chat` ( `klant_id`, `service_id`, `chat_regel`, `sender` ) VALUES (:klant_id, :service_id, :chat_regel, :sender)");
	$getBericht = $chat->prepare("SELECT `chat_regel` , `sender` FROM `chat` WHERE `klant_id` = :klant_id AND `service_id` = :service_id AND `sender` = :sender");
	
	$serviceUpdate = $chat->prepare("UPDATE `service` SET `chat` = 1 WHERE `id` = :id");
	$service = $chat->prepare("INSERT INTO `service` ( `naam` ) VALUES (:naam)");
	$getService = $chat->prepare("SELECT `id` FROM `service` WHERE `naam` = 'hussein'");
	$serviceId = $chat->prepare("SELECT `id` FROM `service` WHERE `naam` = 'hussein'");
	
	
	$chat = filter_input(INPUT_POST, "chat", FILTER_SANITIZE_STRING);
	
	if(!isset($_SESSION["regels_admin"])){
		$_SESSION["regels_admin"]  = 0;
	}
	
	if(!isset($_SESSION["regels_klant"])){
		$_SESSION["regels_klant"]  = 0;
	}

// elke keer wanneer ik een bericht stuur
	
	if(isset($_POST["chat"])){
		
		
		try{
			
			
			
			
			
			if ($_POST["user"] === "service") {
				if(!isset($_SESSION["admin"])){
					$_SESSION["admin"] = "hussein";
					$serviceId->execute();
					$service_id = $serviceId->fetchAll(PDO::FETCH_ASSOC);
					if (!$service_id) {
						$serviceId->execute();
						$service_id = $serviceId->fetchAll(PDO::FETCH_ASSOC);
						$_SESSION["serviceId"] = $service_id;
						
						$getKlant->execute();
						$kla = $getKlant->fetchAll(PDO::FETCH_ASSOC);
						
						if ($kla) {
							$_SESSION["klantId"] = $kla;
							
							$klantUpdate->bindValue(":id",$_SESSION["klantId"][0]["id"] );
							$klantUpdate->execute();
						} else {
							echo " Er zijn op dit moment geen vragen. Een moment geduld alstublieft."
								. $_SESSION["serviceId"][0]["id"];
						}
					} else {
						$getKlant->execute();
						$kla = $getKlant->fetchAll(PDO::FETCH_ASSOC);
						$_SESSION["username"] = $chat;
						$_SESSION["serviceId"] = $service_id;
						
						if ($kla) {
							$klantUpdate->bindValue(":id",$_SESSION["klantId"][0]["id"] );
							$klantUpdate->execute();
							
							
						} else {
							echo "Er zijn op dit moment geen vragen. Een moment geduld alstublieft."
								. $_SESSION["serviceId"][0]["id"];
						}
						
					}
				}
				
				if($_SESSION["klantId"]!== NULL){
					$bericht->bindValue(":klant_id", $_SESSION["klantId"][0]["id"]);
					$bericht->bindValue(":service_id", $_SESSION["serviceId"][0]["id"]);
					$bericht->bindValue(":chat_regel", $chat);
					$bericht->bindValue(":sender", $_SESSION["serviceId"][0]["id"]);
					$bericht->execute();
				}
				$start = true;
					
				}
				
				
				
				
			
			
			
			if($_POST["user"] === "klant" ){
				
				if(!isset($_SESSION["name"])){
					
					$_SESSION["name"] = $chat;
					$klantId->bindValue(":naam", $_SESSION["name"]  );
					$klantId->execute();
					$klant_id = $klantId->fetchAll(PDO::FETCH_ASSOC);
					
					if(!$klant_id) {
						$klant->bindValue(":naam", $_SESSION["name"]);
						$klant->execute();
						$klantId->execute();
						$klant_id = $klantId->fetchAll(PDO::FETCH_ASSOC);
						$_SESSION["klantId"] = $klant_id;
						$getService->execute();
						$serv = $getService->fetchAll(PDO::FETCH_ASSOC);
						$_SESSION["serviceId"] = $serv;
						
						if($serv){
							
							
							
							echo "Hi ". ucfirst($_SESSION["username"]). ", hoe kunnen wij u helpen?" ;
						}else{
							echo "Hi ". ucfirst($_SESSION["username"]). ", helaas zijn al onze medewerkers in gesprek. Een moment geduld alstublieft."
							;
							$sessie = false;
						}
						
						
					}else{
						$getService->execute();
						$serv = $getService->fetchAll(PDO::FETCH_ASSOC);
						$_SESSION["username"] = $chat;
						$_SESSION["klantId"] = $klant_id;
						$_SESSION["serviceId"] = $serv;
						if($serv){
							$serviceUpdate->bindValue(":id", $_SESSION["serviceId"][0]["id"]);
							$serviceUpdate->execute();
							echo "Hi ". ucfirst($_SESSION["username"]). ", hoe kunnen wij u helpen?" .$_SESSION["klantId"][0]["id"];
						}else{
							echo "Hi ". ucfirst($_SESSION["username"]). ", helaas zijn al onze medewerkers in gesprek. Een moment geduld alstublieft."
								.$_SESSION["klantId"][0]["id"];
						}
					}
					
					$_SESSION["serviceId"] = $serv;
				}
				
				if($_SESSION["serviceId"] !== NULL){
					$bericht->bindValue(":klant_id", $_SESSION["klantId"][0]["id"]);
					$bericht->bindValue(":service_id", $_SESSION["serviceId"][0]["id"]);
					$bericht->bindValue(":chat_regel", $chat);
					$bericht->bindValue(":sender", $_SESSION["klantId"][0]["id"]);
					$bericht->execute();
					
					
				}
				$start = true;
			}
			
		}catch(PDOException $e) {
			echo $sql . "<br>" . $e->getMessage();
		}
		
		
		
		
		
		
		$_SESSION["count"] += $_POST["count"];
		
		
	}

//		als de javascript interval een request stuurt
	
	if(isset($_POST["interval"])){
		
		
		if($_POST["user"] === "klant"){
			
			if(!isset($_SESSION["serviceId"]) || $_SESSION["serviceId"][0]["id"] == NULL ){
				
				if($service_id) {
					
					$_SESSION["serviceId"] = $service_id;
					
					$serviceUpdate->bindValue(":id", $_SESSION["serviceId"][0]["id"]);
					$serviceUpdate->execute();
					
					
					if($_SESSION["count"] >1){
						echo "Bedankt voor het wachten u bent nu verbonden met een medewerker";
					}
					
					
				}
				
				
				
				
			}else{
				
				$getBericht->bindValue(":klant_id", $_SESSION["klantId"][0]["id"]);
				$getBericht->bindValue(":service_id", $_SESSION["serviceId"][0]["id"]);
				$getBericht->bindValue(":sender", $_SESSION["serviceId"][0]["id"]);
				$getBericht->execute();
				$replay = $getBericht->fetchAll(PDO::FETCH_ASSOC);
				$arrayCount = count($replay) ;
				$endArray= end($replay);
				$sender = $endArray["sender"];
				if($_SESSION["regels_klant"] < $arrayCount && $sender === $_SESSION["serviceId"][0]["id"]){
					
					
					echo $endArray["chat_regel"];
					
					$_SESSION["regels_klant"] = count($replay);
				}
				
				
				
				
			}
			
			
			
			
			
			
			
		}
		
		
		
		if($_POST["user"] === "service"){
			if(!isset($_SESSION["klantId"]) || $_SESSION["klantId"][0]["id"] == NULL ) {
				$klantId->bindValue(":naam", $_SESSION["name"] );
				$klantId->execute();
				$klant_id = $klantId->fetchAll(PDO::FETCH_ASSOC);
				if ($klant_id) {
					$_SESSION["klantId"] = $klant_id;
					
					$klantUpdate->bindValue(":id", $_SESSION["klantId"][0]["id"]);
					$klantUpdate->execute();
					
					
				}
			}else{
				$getBericht->bindValue(":klant_id", $_SESSION["klantId"][0]["id"]);
				$getBericht->bindValue(":service_id", $_SESSION["serviceId"][0]["id"]);
				$getBericht->bindValue(":sender", $_SESSION["klantId"][0]["id"]);
				$getBericht->execute();
				$replay = $getBericht->fetchAll(PDO::FETCH_ASSOC);
				$arrayCount = count($replay) ;
				$endArray= end($replay);
				$sender = $endArray["sender"];
				if($_SESSION["regels_admin"] < $arrayCount && $sender === $_SESSION["klantId"][0]["id"]){
					
					
					echo $endArray["chat_regel"];
					
					$_SESSION["regels_admin"] = count($replay);
				}
				
			}
			
			
			
			
		}
		
	}
	

	
	
	
	