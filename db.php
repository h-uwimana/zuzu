<?php
	
	$db = new PDO("mysql:host=localhost; dbname=zuzu", "root", "");
	$adres = $db->prepare("INSERT INTO `adres` ( `straatnaam`, `postcode`, `stad` ) VALUES (:straatnaam, :postcode, :stad)");
	$klant = $db->prepare("INSERT INTO `klant` ( `voornaam`, `achternaam`, `email` ) VALUES (:voornaam, :achternaam, :email)");
	$klantId = $db->prepare("SELECT id FROM `klant` WHERE voornaam=:voornaam AND  ");
	
	
	
	