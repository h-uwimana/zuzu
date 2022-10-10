<?php
    session_start();
    include_once "db.php";
   
    if(isset($_POST['submit'])){
        if(!empty($_POST["firstname"]) && !empty($_POST["lastname"]) && !empty($_POST["mail"]) && !empty($_POST["adres"]) &&
                !empty($_POST["postcode"]) && !empty($_POST["city"])){
            $_SESSION["firstname"]  = filter_input(INPUT_POST, "firstname", FILTER_SANITIZE_SPECIAL_CHARS);
            $_SESSION["lastname"] =  filter_input(INPUT_POST, "lastname", FILTER_SANITIZE_SPECIAL_CHARS);
            $_SESSION["mail"] = filter_input(INPUT_POST, "mail", FILTER_VALIDATE_EMAIL);
            $_SESSION["adres"] = filter_input(INPUT_POST, "adres", FILTER_SANITIZE_SPECIAL_CHARS);
            $_SESSION["postcode"] =  filter_input(INPUT_POST, "postcode", FILTER_SANITIZE_SPECIAL_CHARS);
            $_SESSION["city"] =  filter_input(INPUT_POST, "city", FILTER_SANITIZE_SPECIAL_CHARS);
            
            
            if(!$_SESSION["mail"]){
                $mail = "vul een geldig email in";
            }else{
                $adres->bindValue(":straatnaam", $_SESSION["adres"]);
                $adres->bindValue(":postcode", $_SESSION["postcode"]);
                $adres->bindValue(":stad", $_SESSION["city"]);
    
                $klant->bindValue(":voornaam", $_SESSION["firstname"]);
                $klant->bindValue(":achternaam", $_SESSION["lastname"]);
                $klant->bindValue(":email", $_SESSION["mail"]);
                
    
                try{$adres->execute(); $klant->execute();}catch(PDOException $e) {
                    echo $sql . "<br>" . $e->getMessage();
                }
    
                
                header("location: bestel.php",TRUE,302);
            }
            
        }else{
            $melding = "niet alles is ingevuld";
        }
    }else{
        $melding = "Vul alle velden in";
    }

?>
<!DOCTYPE html>
<html lang="html">
<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
	      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
	        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
	        crossorigin="anonymous"></script>
	<title>ZUZU-klantgegevens</title>
</head>
<body>
<!--navbar-->
<nav class="navbar position-sticky top-0 navbar-expand-lg navbar-light bg-dark ">
	<div class="container-fluid">
		<a class="navbar-brand text-light" href="index.php">ZUZU</a>
		<button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse"
		        data-bs-target="#navbarNavAltMarkup"
		        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
			<div class="navbar-nav">
				<a class="nav-link active text-light" aria-current="page" href="index.php">Home</a>
				<a class="nav-link active text-light" href="klantgegevens.php">Bestellen</a>
			</div>
		</div>
	</div>
</nav>
<!--end navbar-->
<!--top image-->
<section class=" container-fluid pt-5" style="
            background: url('img/headerimage.png');
            background-size: cover;">
	<div class="pt-5"></div>
</section>
<!--end top image--->
<!--main page--><!--main page-->
<section class=" container-sm  mt-3">
	<h1> Klantgegevens</h1>
	<div class="w-50 fw-bold">
		<form method="post" class="needs-validation"  novalidate>

			<div class="mb-3  ">
				<label for="firstname" class="form-label">
					Voornaam
				</label>
				<input id="firstname" type="text" class="form-control" name="firstname" value="<?php if(isset($_POST["firstname"])){
                    echo $_POST["firstname"];}?>" required>
                <div class="invalid-feedback">
                    Vul uw voornaam in.
                </div>
			</div>
			<div class="mb-3">
				<label for="lastname" class="form-label">
					Achternaam
				</label>
				<input id="lastname" type="text" class="form-control" name="lastname" value="<?php if(isset($_POST["lastname"])){
                    echo $_POST["lastname"];}?>" required>
                <div class="invalid-feedback">
                    Vul uw achternaam in.
                </div>
			</div>
			<div class="mb-3">
				<label for="mail" class="form-label">
					Email
				</label>
				<input id="mail" type="email" class="form-control <?php if(isset($mail)){ echo "is-invalid";}?>"
                       name="mail" value="<?php if(isset($_POST["mail"])){
                    echo $_POST["mail"];}?>" required>
                <div class="invalid-feedback">
                    Vul een geldige e-mail in.
                </div>
			</div>
			<div class="mb-3">
				<label for="adres" class="form-label">
					Adres
				</label>
				<input id="adres" type="text" class="form-control" name="adres" value="<?php if(isset($_POST["adres"])){
                    echo $_POST["adres"];}?>" required>
                <div class="invalid-feedback">
                    Vul uw adres in.
                </div>
			</div>
			<div class="mb-3">
				<label for="postcode" class="form-label">
					Postcode
				</label>
				<input id="postcode" type="text" class="form-control" name="postcode" value="<?php if(isset($_POST["postcode"])){
                    echo $_POST["postcode"];}?>" required>
                <div class="invalid-feedback">
                    Vul uw postcode in.
                </div>
			</div>
			<div class="mb-3">
				<label for="city" class="form-label">
					Woonplaats
				</label>
				<input id="city" type="text" class="form-control" name="city" value="<?php if(isset($_POST["city"])){
                    echo $_POST["city"];}?>" required>
                <div class="invalid-feedback">
                    Vul uw woonplaats in.
                </div>
			</div>
			<button type="submit" class="btn btn-dark" name="submit">Ga naar sushi's</button>
		</form>
        <br>
	</div>
</section>
<!--end main page-->
<!--footer-->
<footer class="bottom-0 container-fluid bg-dark">
	<div class=" container-fluid text-center text-light">
		<div class="row">
			<div class="col my-4">
				<p class="m-0"><strong>Contactgegevens</strong></p>
				<p class="m-0">Restaurant ZuZu</p>
				<p class="m-0">Appelstraat 1</p>
				<p class="m-0">1111a Fruit</p>
				<p class="m-0">zuzu@gamil.com</p>
				<p class="m-0">06-12345678</p>
			</div>
			<div class="col mt-4">
				<p class="m-0"><strong>Openingstijden</strong></p>
				<p class="m-0">Maandag:</p>
				<p class="m-0">Dinsdag:</p>
				<p class="m-0">Woensdag:</p>
				<p class="m-0">Donderdag:</p>
				<p class="m-0">Vrijdag:</p>
				<p class="m-0">Zaterdag:</p>
				<p class="m-0">Zondag:</p>
			</div>
		</div>
		<div>
</footer>
<!--end footer-->

</body>
<script>
    
    (function () {
        'use strict'
        
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        let forms = document.querySelectorAll('.needs-validation')
        
        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
                .forEach(function (form) {
                    form.addEventListener('submit', function (event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }
                        
                        form.classList.add('was-validated')
                    }, false)
                })
    })()
    
</script>
</html>
