<?php
	
	$db = new PDO("mysql:host=localhost; dbname=zuzu", "root", "");
	$adresId = $db->prepare("SELECT id FROM `adres` WHERE straatnaam=:straatnaam AND postcode=:postcode   ");
	
	
	
	