<?php
	
	session_start();
	
	$komkommer = $_SESSION["makiKomkommer"]  * 1.50;
	$avocado = $_SESSION["makiAvocado"]  * 1.60;
	$zalm = $_SESSION["nagiriZalm"]  * 1.75;
	$philly = $_SESSION["philadelphiaRoll"]  * 1.40;
	$tuna = $_SESSION["spicyTunaRoll"]  * 1.80;
	$cally = $_SESSION["californiaRoll"]  * 1.90;
	$all = $komkommer + $avocado + $zalm + $philly + $tuna + $cally;
	$total = number_format($all, 2, ',', '.');
	
	

?>
<!DOCTYPE html>
<html lang="html">
<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
	      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
	        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
	        crossorigin="anonymous"></script>
	<title>ZUZU-View</title>
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
<section class=" my-5 h-100 container-sm text-center ">
	<div class=" text-center fw-bold h-100 my-3 ">
		<div class="card w-50 mx-auto" >
			<div class="card-body">
				<h2 class="card-title"> Uw bestelde sushi</h2>
				
				<?php if($_SESSION["makiKomkommer"] > 0) echo "<p class='card-text'> Maki komkommer: ". $_SESSION["makiKomkommer"]."st</p>" ?>
				
				<?php if($_SESSION["makiAvocado"] > 0) echo "<p class='card-text'> Maki Avocado: ". $_SESSION["makiAvocado"]."st</p>" ?>
				
				<?php if($_SESSION["nagiriZalm"] > 0) echo "<p class='card-text'> Nigiri zalm: ". $_SESSION["nagiriZalm"]."st</p>" ?>
				
				<?php if($_SESSION["philadelphiaRoll"] > 0) echo "<p class='card-text'> Philadelphia Roll: ". $_SESSION["philadelphiaRoll"]."st</p>" ?>
				
				<?php if($_SESSION["spicyTunaRoll"] > 0) echo "<p class='card-text'> Spicy Tuna Roll: ". $_SESSION["spicyTunaRoll"]."st</p>" ?>
				
				<?php if($_SESSION["californiaRoll"] > 0) echo "<p class='card-text'> California Roll: ". $_SESSION["californiaRoll"]."st</p>" ?>
				
				<?php echo "<p class='card-text'> Uw total is &euro;{$total}</p>" ?>
			</div>
		</div>
	</div>
	<div class="fw-bold ">
		<div class="card w-50 mx-auto" >
			<div class="card-body">
				<h3 class="card-title">Uw Gegevens</h3>
				<p class="card-text">naam: <?php echo ucfirst($_SESSION["firstname"]). " ". ucfirst($_SESSION["lastname"]);
                ?></p>
				<p class="card-text"> E-mail: <?php echo $_SESSION["mail"]; ?></p>
				<p class="card-text"> adres: <?php echo $_SESSION["adres"]; ?></p>
				<p class="card-text"> postcode:  <?php echo $_SESSION["postcode"]. " ". $_SESSION["city"];; ?></p>
			</div>
		</div>
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
        var forms = document.querySelectorAll('.needs-validation')

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
