<?php
    
    session_start();
    
    if($_SESSION["login"] == true){
        header("location: user/index.php");
        exit();
    }else{
        include_once "db.php";
        $getService = $chat->prepare("SELECT `email`, `wachtwoord` FROM `service` WHERE `email` = :email");
        if(isset($_POST["submit"])){
            if(!empty($_POST["pwd"])){
                $email = $_SESSION["email"] = filter_input(INPUT_POST, "mail", FILTER_VALIDATE_EMAIL);
                $pwd = filter_input(INPUT_POST, "pwd", FILTER_SANITIZE_SPECIAL_CHARS);
                
                if($email == false){
                    $mail ="hello";
                }else{
                    $getService->bindValue(":email", $email);
                    $getService->execute();
                    $user = $getService->fetch(PDO::FETCH_ASSOC);
                    
                    if($user == false){
                        $mail ="hello";
                    }else{
                        if (password_verify($pwd, $user["wachtwoord"])) {
                            $_SESSION["login"] = true;
                            
                            header("location: user/index.php");
                        } else {
                            $password ="hello";
                        }
                    }
                }
            }
        }
    }

?>
<html lang="nl">
<head>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
	      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
	        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
	        crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<title>ZUZU-Login</title>
</head>
<style>
    body {
        background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
        background-size: 400% 400%;
        animation: gradient 15s ease infinite;
        height: 100vh;
    }
    
    @keyframes gradient {
        0% {
            background-position: 0% 50%;
        }
        50% {
            background-position: 100% 50%;
        }
        100% {
            background-position: 0% 50%;
        }
    }
</style>
<body>
<!--navbar-->
<nav class=" index  position-sticky top-0 navbar navbar-expand-lg navbar-light bg-dark ">
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
<!----- end navbar --->


<!--main page-->
<div class="  d-flex justify-content-center align-items-center " style=" min-height:80vh;">
    <div class="border bg-light border-light position-relative  rounded-1 border-3 p-3 d-flex justify-content-center align-items-end
" style=" width:30rem; height: 25rem">
        
        
            
            <form class="needs-validation text-center"  style=" width:90%" method="post" novalidate>
                <div class="  mx-auto rounded rounded-circle m-3  " style="background:
        url('img/blank.jpg');
        background-size: cover;
        width:5rem;
        height:5rem;">
                </div>
                <div class=" form-floating mb-3 ">
                    
                    <input type="email"  id="email" aria-describedby="emailHelp" class="form-control <?php if(isset
                    ($mail)){ echo "is-invalid";}?>"
                    name="mail" value="<?php if(isset($_POST["mail"])){
                        echo $_POST["mail"];}?>" required>
                    <label for="email" class="form-label">Email address</label>
                    <div class="invalid-feedback ">
                        Het ingevoerde e-mailadres is niet gekoppeld aan een account.
                    </div>
                </div>
                <div class="form-floating ">
                    
                    <input type="password" id="pwd"  placeholder="test"class="form-control <?php if(isset
                    ($password)){ echo "is-invalid";}?>"
                           name="pwd" value="<?php if(isset($_POST["pwd"])){
                        echo $_POST["pwd"];}?>" required>
                    <label for="pwd" class="form-label">Password</label>
                    <div class="invalid-feedback">
                        Het wachtwoord is onjuist.
                    </div>
                </div>
                <button type="submit" name="submit" class="btn btn-primary py-2 mt-3 mx-auto w-50">Login</button>
            </form>
        
    </div>
</div>
<!--end main page-->
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