
<html lang="html">
<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
	      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
	        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
	        crossorigin="anonymous"></script>
	<title>ZUZU-Homepage</title>
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
		<form method="post" action="bestel.php">

			<div class="mb-3  ">
				<label for="exampleInputEmail1" class="form-label">
					Voornaam
				</label>
				<input type="text" class="form-control" name="firstname">
			</div>
			<div class="mb-3">
				<label for="exampleInputPassword1" class="form-label">
					Achternaam
				</label>
				<input type="text" class="form-control" name="lastname">
			</div>
			<div class="mb-3">
				<label for="exampleInputPassword1" class="form-label">
					Email
				</label>
				<input type="mail" class="form-control" name="mail">
			</div>
			<div class="mb-3">
				<label for="exampleInputPassword1" class="form-label">
					Adres
				</label>
				<input type="text" class="form-control" name="adres">
			</div>
			<div class="mb-3">
				<label for="exampleInputPassword1" class="form-label">
					Postcode
				</label>
				<input type="text" class="form-control" name="postcode">
			</div>
			<div class="mb-3">
				<label for="exampleInputPassword1" class="form-label">
					Woonplaats
				</label>
				<input type="text" class="form-control" name="city">
			</div>
			<button type="submit" class="btn btn-dark" name="klant">Ga naar sushi's</button>
		</form>
		<?php
			if(isset($_POST["klant"])){

				echo $_POST["firstname"];
			}
		?>
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
				<33063306p class="m-0">1111a Fruit</33063306p>
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

</script>
</html>
