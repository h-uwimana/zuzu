<!DOCTYPE html>

<?php
    session_start();
    var_dump($_SESSION);
if(isset($_POST["submit"])){
    if(!empty($_POST["makiKomkommer"]) && !empty($_POST["makiAvocado"]) && !empty($_POST["nagiriZalm"]) && !empty($_POST["philadelphiaRoll"]) &&
            !empty($_POST["spicyTunaRoll"]) && !empty($_POST["californiaRoll"])){
    
        
        
        $_SESSION["makiKomkommer"]  = filter_input(INPUT_POST, "makiKomkommer", FILTER_VALIDATE_INT);
        $_SESSION["makiAvocado"] =  filter_input(INPUT_POST, "makiAvocado", FILTER_VALIDATE_INT);
        $_SESSION["nagiriZalm"] = filter_input(INPUT_POST, "nagiriZalm", FILTER_VALIDATE_INT);
        $_SESSION["philadelphiaRoll"] = filter_input(INPUT_POST, "philadelphiaRoll", FILTER_VALIDATE_INT);
        $_SESSION["spicyTunaRoll"] =  filter_input(INPUT_POST, "spicyTunaRoll", FILTER_VALIDATE_INT);
        $_SESSION["californiaRoll"] =  filter_input(INPUT_POST, "californiaRoll", FILTER_VALIDATE_INT);
        $aantal = array(5, 10 ,10, 5, 5, 8);
        
        
        switch($_SESSION["makiKomkommer"] ){
        
        }
        
    }
}

?>


<html lang="nl">
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
    <nav class="navbar  navbar-expand-lg navbar-light bg-dark ">
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
                    <a class="nav-link active text-light" href="bestel.php">Bestellen</a>
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
        <h1> Sushi's bestellen</h1>
        <?php
    
//            if(isset($_POST["submit"])){
//
//                echo $makiKomkommer. $makiAvocado. $nagiriZalm. $philadelphiaRoll. $spicyTunaRoll. $californiaRoll ;
//            }
            
        ?>
        <div class="w-50 fw-bold">
            <form method="post" class="needs-validation"  novalidate>

                <div class="mb-3  ">
                    <label for="exampleInputEmail1" class="form-label">
                        Maki komkommer <small class="fw-light fst-italic">(max = 5)</small>
                    </label>
                    <input id="input" type="number" class="form-control" name="makiKomkommer" value="<?php if(isset
                    ($_SESSION["makiKomkommer"])){
                        echo $_SESSION["makiKomkommer"];}?>" required>
                <div id="feedback" class="invalid-feedback">
                    Vul het juiste aantal in
                </div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">
                        Maki Avocado <small class="fw-light fst-italic">(max = 10)</small>
                    </label>
                    <input id="input" type="number" class="form-control" name="makiAvocado" value="<?php if(isset
                    ($_SESSION["makiAvocado"])){
                        echo $_SESSION["makiAvocado"];}?>" required>
                <div id="feedback" class="invalid-feedback">
                    Vul het juiste aantal in
                </div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">
                        Nigiri zalm <small class="fw-light fst-italic">(max = 10)</small>
                    </label>
                    <input id="input" type="number" class="form-control" name="nagiriZalm" value="<?php if(isset($_SESSION["nagiriZalm"])){
                        echo $_POST["nagiriZalm"];}?>" required>
                <div id="feedback" class="invalid-feedback">
                    Vul het juiste aantal in
                </div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">
                        Philadelphia Roll <small class="fw-light fst-italic">(max = 5)</small>
                    </label>
                    <input id="input" type="number" class="form-control" name="philadelphiaRoll" value="<?php if
                    (isset($_SESSION["philadelphiaRoll"])){
                        echo $_SESSION["philadelphiaRoll"];}?>" required>
                <div id="feedback" class="invalid-feedback">
                    Vul het juiste aantal in
                </div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">
                        Spicy Tuna Roll <small class="fw-light fst-italic">(max = 5)</small>
                    </label>
                    <input id="input" type="number" class="form-control" name="spicyTunaRoll" value="<?php if(isset
                    ($_SESSION["spicyTunaRoll"])){
                        echo $_SESSION["spicyTunaRoll"];}?>" required>
                <div id="feedback" class="invalid-feedback">
                    Vul het juiste aantal in
                </div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">
                        California Roll <small class="fw-light fst-italic">(max = 8)</small>
                    </label>
                    <input id="input" type="number" class="form-control " name="californiaRoll" value="<?php if(isset
                    ($_SESSION["californiaRoll"])){
                        echo $_SESSION["californiaRoll"];}?>" required>
                <div id="feedback" class="invalid-feedback">
                    Vul het juiste aantal in
                </div>
                </div>
                <button type="submit" class="btn btn-dark" name="submit">Verzenden</button>
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
            let invul = document.querySelectorAll("#input")
            const feedBack = document.querySelectorAll('#feedback');
            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                    .forEach(function (form, index) {
                        console.log(form[index])
                        
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

<?php


?>
</html>
