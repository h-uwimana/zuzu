<?php
	
	
	if($_SESSION["user"] === "service" ) {
		if($_SESSION["count"] === 1){
			
			$serviceId->bindValue(":naam", $chat);
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
				$_SESSION["klantId"] = $kla;
				if($kla){
					echo "Hi ". ucfirst($_SESSION["username"]). ", hoe kunnen wij u helpen?" .$_SESSION["serviceId"][0]["id"];
				}else{
					echo "Hi ". ucfirst($_SESSION["username"]). ", er zijn op dit moment vragen. Een moment geduld alstublieft."
						.$_SESSION["serviceId"][0]["id"];
				}
			}else{
				$getKlant->execute();
				$kla = $getKlant->fetchAll(PDO::FETCH_ASSOC);
				$_SESSION["username"] = $chat;
				$_SESSION["serviceId"] = $service_id;
				$_SESSION["klantId"] = $kla;
				if($kla){
					
					var_dump($kla);
					echo "Hi ". ucfirst($_SESSION["username"]). ", hoe kunnen wij u helpen?" .$_SESSION["serviceId"][0]["id"];
				}else{
					echo "Hi ". ucfirst($_SESSION["username"]). ", er zijn op dit moment vragen. Een moment geduld alstublieft."
						.$_SESSION["serviceId"][0]["id"];
				}
				
			}
			
			
			
			
		}
		
		if($_SESSION["count"] > 1 && $serv !== false){
			$bericht->bindValue(":klant_id", $_SESSION["klantId"][0]["id"]);
			$bericht->bindValue(":service_id", $_SESSION["serviceId"][0]["id"]);
			$bericht->bindValue(":chat_regel", $chat);
			$bericht->bindValue(":sender", $_SESSION["serviceId"][0]["id"]);
			$bericht->execute();
			
		}
		
		$start = true;
	}



