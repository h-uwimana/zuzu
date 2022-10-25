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
	$getService = $chat->prepare("SELECT `id` FROM `service` WHERE `chat` = 0");
	$serviceId = $chat->prepare("SELECT `id` FROM `service` WHERE `naam` = :naam");
	
	
	$chat = filter_input(INPUT_POST, "chat", FILTER_SANITIZE_STRING);
	
	
	
// elke keer wanneer ik een bericht stuur

		if(isset($_POST["chat"])){
			
			
			try{
				if($chat == 1 && $_SESSION["count"] === 0){
					$_SESSION["user"] = "service";
					
					echo "uw naam?";
					
				}
				
				if($chat == 0 && $_SESSION["count"] === 0){
					$_SESSION["user"] = "klant";
					echo "Wat is uw naam?";
					
				}
				
				
				if ($_SESSION["user"] === "service") {
					if ($_SESSION["count"] === 1) {
						$_SESSION["name"] = $chat;
						$serviceId->bindValue(":naam", $_SESSION["name"] );
						$serviceId->execute();
						$service_id = $serviceId->fetchAll(PDO::FETCH_ASSOC);
						
						if (!$service_id) {
							$service->bindValue(":naam", $chat);
							$service->execute();
							$serviceId->execute();
							$service_id = $serviceId->fetchAll(PDO::FETCH_ASSOC);
							$_SESSION["username"] = $chat;
							$_SESSION["serviceId"] = $service_id;
							
							$getKlant->execute();
							$kla = $getKlant->fetchAll(PDO::FETCH_ASSOC);
							
							if ($kla) {
								$_SESSION["klantId"] = $kla;
								
								$klantUpdate->bindValue(":id",$_SESSION["klantId"][0]["id"] );
								$klantUpdate->execute();
							} else {
								echo "Hi " . ucfirst($_SESSION["username"]) . ", er zijn op dit moment vragen. Een moment geduld alstublieft."
									. $_SESSION["serviceId"][0]["id"];
							}
						} else {
							$getKlant->execute();
							$kla = $getKlant->fetchAll(PDO::FETCH_ASSOC);
							$_SESSION["username"] = $chat;
							$_SESSION["serviceId"] = $service_id;
							$_SESSION["klantId"] = $kla;
							if ($kla) {
								$klantUpdate->bindValue(":id",$_SESSION["klantId"][0]["id"] );
								$klantUpdate->execute();
								
								
							} else {
								echo "Hi " . ucfirst($_SESSION["username"]) . ", er zijn op dit moment vragen. Een moment geduld alstublieft."
									. $_SESSION["serviceId"][0]["id"];
							}
							
						}
						
						
					}
					
					if($_SESSION["count"] > 1 && $_SESSION["serviceId"] !== NULL){
						$bericht->bindValue(":klant_id", $_SESSION["klantId"][0]["id"]);
						$bericht->bindValue(":service_id", $_SESSION["serviceId"][0]["id"]);
						$bericht->bindValue(":chat_regel", $chat);
						$bericht->bindValue(":sender", $_SESSION["serviceId"][0]["id"]);
						$bericht->execute();
					}
					
					$start = true;
				}
				
				
				if($_SESSION["user"] === "klant" ){
					
					if($_SESSION["count"] === 1){
						
						$_SESSION["name"] = $chat;
						$klantId->bindValue(":naam", $_SESSION["name"]  );
						$klantId->execute();
						$klant_id = $klantId->fetchAll(PDO::FETCH_ASSOC);
						
						if(!$klant_id) {
							$klant->bindValue(":naam", $chat);
							$klant->execute();
							$klantId->execute();
							$klant_id = $klantId->fetchAll(PDO::FETCH_ASSOC);
							$_SESSION["username"] = $chat;
							$_SESSION["klantId"] = $klant_id;
							$getService->execute();
							$serv = $getService->fetchAll(PDO::FETCH_ASSOC);
							$_SESSION["serviceId"] = $serv;
							
							if($serv){
								
								$serviceUpdate->bindValue(":id", $_SESSION["serviceId"][0]["id"]);
								$serviceUpdate->execute();
								
								echo "Hi ". ucfirst($_SESSION["username"]). ", hoe kunnen wij u helpen?" .$_SESSION["klantId"][0]["id"];
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
					
					if($_SESSION["count"] > 1 && $_SESSION["serviceId"] !== NULL){
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
		
		if(isset($_POST["interval"]) ){
			
			
			if($_SESSION["user"] === "klant"){
				
				if(!isset($_SESSION["serviceId"]) || $_SESSION["serviceId"][0]["id"] == NULL ){
					$getService->execute();
					$service_id = $getService->fetchAll(PDO::FETCH_ASSOC);
					
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
					if($_SESSION["regels"] < $arrayCount && $sender === $_SESSION["serviceId"][0]["id"]){
						
						
						echo $endArray["chat_regel"];
						
						$_SESSION["regels"] = count($replay);
					}

					
					
					
				}
				
				
				
				
				
				
				
			}
			
			
			
			if($_SESSION["user"] === "service"){
				
				if(!isset($_SESSION["klantId"]) || $_SESSION["klantId"][0]["id"] == NULL ) {
					$klantId->bindValue(":naam", $_SESSION["name"] );
					$klantId->execute();
					$klant_id = $klantId->fetchAll(PDO::FETCH_ASSOC);
					if ($klant_id) {
						$_SESSION["klantId"] = $klant_id;
						
						$klantUpdate->bindValue(":id", $_SESSION["klantId"][0]["id"]);
						$klantUpdate->execute();
						
						if($_SESSION["count"] >1){
							echo "Bedankt voor het wachten u bent nu verbonden met een medewerker";
						}
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
					if($_SESSION["regels"] < $arrayCount && $sender === $_SESSION["klantId"][0]["id"]){
						
						
						echo $endArray["chat_regel"];
						
						$_SESSION["regels"] = count($replay);
					}
					
				}
				
				
				
				
			}
			
		}
		

	
	
	
	