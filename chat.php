<?php
include_once"db.php";
	session_start();
	if(isset($_post["chat"])){
		$_SESSION["bericht"] = "hello";
		
		
	}
	
	$replay = "hello";