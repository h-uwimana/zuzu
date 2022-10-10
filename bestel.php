<!DOCTYPE html>

<?php
    session_start();
    include_once "db.php";
    
    $query = $db->prepare("SELECT * FROM sushi");
    
    $query->execute();
    
    $sushi = $query->fetchAll(PDO::FETCH_ASSOC);
    
    $bestelling = $db->prepare("INSERT INTO `bestelling` ( `klant_id`, `sushi_id`, `aantal` ) VALUES (:klant_id, :sushi_id, :aantal)");
    $bestellingId = $db->prepare("SELECT `id` FROM `bestelling` WHERE `klant_id` = :klant_id AND `sushi_id` = :sushi_id AND `aantal` = :aantal");
    $sushi_voorraad = $db->prepare("UPDATE `sushi` SET `voorraad`=:voorraad WHERE `naam` = :naam ");
    
if(isset($_POST["submit"])){
    if($_POST["makiKomkommer"] > 0 || $_POST["makiAvocado"] > 0 || $_POST["nagiriZalm"] > 0 || $_POST["philadelphiaRoll"] > 0 ||
            $_POST["spicyTunaRoll"] > 0 || $_POST["californiaRoll"] > 0){
    
    

    
        $_SESSION["makiKomkommer"]  = filter_input(INPUT_POST, "makiKomkommer", FILTER_VALIDATE_INT);
        $_SESSION["makiAvocado"] =  filter_input(INPUT_POST, "makiAvocado", FILTER_VALIDATE_INT);
        $_SESSION["nagiriZalm"] = filter_input(INPUT_POST, "nagiriZalm", FILTER_VALIDATE_INT);
        $_SESSION["philadelphiaRoll"] = filter_input(INPUT_POST, "philadelphiaRoll", FILTER_VALIDATE_INT);
        $_SESSION["spicyTunaRoll"] =  filter_input(INPUT_POST, "spicyTunaRoll", FILTER_VALIDATE_INT);
        $_SESSION["californiaRoll"] =  filter_input(INPUT_POST, "californiaRoll", FILTER_VALIDATE_INT);
        
        
        if($_SESSION["makiKomkommer"]  === false){
            $komkommer = "Vul het juiste aantal in";
            $kom = false;
        }if($_SESSION["makiKomkommer"] !== false && $_SESSION["makiKomkommer"] <= 5 && $_SESSION["makiKomkommer"] >= 0
        ){
            $kom = true;
        }
        
        if($_SESSION["makiAvocado"] === false  ){
            $avocado = "Vul het juiste aantal in";
            $avo = false;
            
        }if($_SESSION["makiAvocado"] !== false && $_SESSION["makiAvocado"] <= 10 && $_SESSION["makiAvocado"] >= 0  ){
            $avo = true;
        }
        
        
        
        if($_SESSION["nagiriZalm"] === false ){
            $zalm = "Vul het juiste aantal in";
            $za = false;
        }if($_SESSION["nagiriZalm"] !== false && $_SESSION["nagiriZalm"] <= 10 && $_SESSION["nagiriZalm"] >= 0  ){
            $za = true;
        }
        
        if($_SESSION["philadelphiaRoll"] === false ){
            $philly = "Vul het juiste aantal in";
            $phil = false;
        }if($_SESSION["philadelphiaRoll"] !== false && $_SESSION["philadelphiaRoll"] <= 5 && $_SESSION["philadelphiaRoll"] >= 0  ){
            $phil = true;
        }
        
        if($_SESSION["spicyTunaRoll"] === false){
            $tuna = "Vul het juiste aantal in";
            $tu = false;
        }if($_SESSION["spicyTunaRoll"] !== false && $_SESSION["spicyTunaRoll"] <= 5 && $_SESSION["spicyTunaRoll"] >= 0
        ){
            $tu = true;
        }
        
        if($_SESSION["californiaRoll"]  === false){
            $cally = "Vul het juiste aantal in";
            $cal = false;
        }if($_SESSION["californiaRoll"] !== false && $_SESSION["californiaRoll"] <= 8 && $_SESSION["californiaRoll"] >=
                0  ){
            $cal = true;
        }
        
        if(isset($kom) && isset($avo) && isset($za) && isset($phil) && isset($tu) && isset($cal)){
        if( $kom === true && $avo === true && $za === true && $phil === true && $tu === true && $cal === true ){
            $index = 0;
            foreach($_SESSION as $key=>$value)
            {
                if(is_integer($value) && $key !== "klant_id" && $value > 0){
                    if($sushi[$index]["naam"] == $key){
                        try{
                            $bestellingId->bindValue(":klant_id", $_SESSION["klant_id"]);
                            $bestellingId->bindValue(":sushi_id", $sushi[$index]["id"]);
                            $bestellingId->bindValue(":aantal", $value);
                            $bestellingId->execute();
                            $Bestelling_id = $bestellingId->fetchAll(PDO::FETCH_ASSOC);
                            
                                $bestelling->bindValue(":klant_id", $_SESSION["klant_id"]);
                                $bestelling->bindValue(":sushi_id", $sushi[$index]["id"]);
                                $bestelling->bindValue(":aantal", $value);
                                $bestelling->execute();
                                $sushi_voorraad ->bindValue(":voorraad" ,$sushi[$index]["voorraad"] - $value );
                                $sushi_voorraad->bindValue(":naam", $key);
                                $sushi_voorraad->execute();
                            
                            
                        }catch(PDOException $e) {
                            echo $sql . "<br>" . $e->getMessage();
                        }
                    }
                    $index+=1;
                }
                
            }
            header("location: view.php");
        }}

    }else{
        $niks = "U heeft niks ingevuld";
    }
    if($_POST["makiKomkommer"] > 5){
        $komkommer = " Het aantal dat u heeft gekozen is te hoog ";
        $kom = false;
    }
    if($_POST["makiKomkommer"] < 0){
        $komkommer = " Het aantal dat u heeft gekozen is te laag ";
        $kom = false;
    }
    if($_POST["makiAvocado"] > 10 ){
        $avocado = " Het aantal dat u heeft gekozen is te hoog ";
        $avo = false;
    }
    if($_POST["makiAvocado"] < 0){
        $avocado = " Het aantal dat u heeft gekozen is te laag ";
        $avo = false;
    }
    if($_POST["nagiriZalm"] > 10 ){
        $zalm = " Het aantal dat u heeft gekozen is te hoog ";
        $za = false;
    }
    if($_POST["nagiriZalm"] < 0){
        $zalm = " Het aantal dat u heeft gekozen is te laag ";
        $za = false;
    }
    if($_POST["philadelphiaRoll"] > 5 ){
        $philly = " Het aantal dat u heeft gekozen is te hoog ";
        $phil = false;
    }
    if($_POST["philadelphiaRoll"] < 0){
        $philly = " Het aantal dat u heeft gekozen is te laag ";
        $phil = false;
    }
    if($_POST["spicyTunaRoll"] > 5 ){
        $tuna = " Het aantal dat u heeft gekozen is te hoog ";
        $tu = false;
    }
    if($_POST["spicyTunaRoll"] < 0){
        $tuna = " Het aantal dat u heeft gekozen is te laag ";
        $tu = false;
    }
    if($_POST["californiaRoll"] > 8 ){
        $cally = " Het aantal dat u heeft gekozen is te hoog ";
        $cal = false;
    }
    if($_POST["californiaRoll"] < 0){
        $cally = " Het aantal dat u heeft gekozen is te laag ";
        $cal = false;
    
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
        <title>ZUZU-Bestelpagina</title>
    </head>
    <body>
    <!--navbar-->
    <nav class="navbar position-sticky top-0  navbar-expand-lg navbar-light bg-dark ">
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
        <div class="w-50 fw-bold">
            <form method="post" class="needs-validation"  novalidate>

                <div class="mb-3  ">
                    <label for="komkommer" class="form-label">
                        Maki komkommer <small class="fw-light fst-italic">(max = 5)</small>
                    </label>
                    <input id="komkommer" type="number" class="form-control <?php if(isset($komkommer)){ echo "is-invalid";
                    }?>" name="makiKomkommer" value="<?php if(isset
                    ($_POST["makiKomkommer"])){
                        echo $_POST["makiKomkommer"];} else{ echo 0;}?>" required>
                <div id="feedback" class="invalid-feedback">
                    <?php if(isset($komkommer)){
                        echo $komkommer;
                    } else{
                        echo "Vul het juiste aantal in";
                    }
                    ?>
                </div>
                </div>
                <div class="mb-3">
                    <label for="avocado" class="form-label">
                        Maki Avocado <small class="fw-light fst-italic">(max = 10)</small>
                    </label>
                    <input id="avocado" type="number" class="form-control <?php if(isset($avocado)){ echo "is-invalid";
                    }?>" name="makiAvocado" value="<?php if(isset
                    ($_POST["makiAvocado"])){
                        echo $_POST["makiAvocado"];} else{ echo 0;}?>" required>
                <div id="feedback" class="invalid-feedback">
                    <?php if(isset($avocado)){
                        echo $avocado;
                    } else{
                        echo "Vul het juiste aantal in";
                    }
                    ?>
                </div>
                </div>
                <div class="mb-3">
                    <label for="zalm" class="form-label">
                        Nigiri zalm <small class="fw-light fst-italic">(max = 10)</small>
                    </label>
                    <input id="zalm" type="number" class="form-control <?php if(isset($zalm)){ echo "is-invalid";}?>"
                           name="nagiriZalm" value="<?php if(isset
                    ($_POST["nagiriZalm"])){
                        echo $_POST["nagiriZalm"];} else{ echo 0;}?>" required>
                <div id="feedback" class="invalid-feedback">
                    <?php if(isset($zalm)){
                        echo $zalm;
                    } else{
                        echo "Vul het juiste aantal in";
                    }
                    ?>
                </div>
                </div>
                <div class="mb-3">
                    <label for="philly" class="form-label">
                        Philadelphia Roll <small class="fw-light fst-italic">(max = 5)</small>
                    </label>
                    <input id="philly" type="number" class="form-control <?php if(isset($philly)){ echo "is-invalid";
                    }?>" name="philadelphiaRoll" value="<?php if
                    (isset($_POST["philadelphiaRoll"])){
                        echo $_POST["philadelphiaRoll"];} else{ echo 0;}?>" required>
                <div id="feedback" class="invalid-feedback">
                    <?php if(isset($philly)){
                        echo $philly;
                    } else{
                        echo "Vul het juiste aantal in";
                    }
                    ?>
                </div>
                </div>
                <div class="mb-3">
                    <label for="tuna" class="form-label">
                        Spicy Tuna Roll <small class="fw-light fst-italic">(max = 5)</small>
                    </label>
                    <input id="tuna" type="number" class="form-control <?php if(isset($tuna)){ echo "is-invalid";}?>"
                           name="spicyTunaRoll" value="<?php if(isset
                    ($_POST["spicyTunaRoll"])){
                        echo $_POST["spicyTunaRoll"];} else{ echo 0;}?>" required>
                <div id="feedback" class="invalid-feedback">
                    <?php if(isset($tuna)){
                        echo $tuna;
                    } else{
                        echo "Vul het juiste aantal in";
                    }
                    ?>
                </div>
                </div>
                <div class="mb-3">
                    <label for="cally" class="form-label">
                        California Roll <small class="fw-light fst-italic">(max = 8)</small>
                    </label>
                    <input id="cally" type="number" class="form-control <?php if(isset($cally)){ echo "is-invalid";}?>"
                           name="californiaRoll" value="<?php if(isset
                    ($_POST["californiaRoll"])){
                        echo $_POST["californiaRoll"];} else{ echo 0;}?>" required>
                <div id="feedback" class="invalid-feedback">
                    <?php if(isset($cally)){
                        echo $cally;
                    } else{
                        echo "Vul het juiste aantal in";
                    }
                    ?>
                </div>
                </div>
                <input type="submit" class="btn btn-dark <?php if(isset($niks)){ echo "is-invalid";}?>"
                       value="Verzenden" name="submit">
                <div id="feedback" class="invalid-feedback">
                    <?php if(isset($niks)){
                        echo $niks;
                    } else{
                        echo "Vul het juiste aantal in";
                    }
                    ?>
                </div>
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
