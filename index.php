<?php
    
session_start();

?>

<html lang="nl">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
    <title>ZUZU-Home</title>
</head>
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
    <div class="row">
        <div class="col-12 text-center">
            <h1>
                <?php
                    if(isset($_SESSION["firstname"])){
                        $string = str_replace(' ', '', $_SESSION["firstname"]);
                        $name = "  ". ucfirst($string);
                        
                    }else {
                        $name = "";
                    }
                    $date = date("G");
                    switch($date){
                        case $date >= 6 && $date <= 12: echo "GoedeMorgen{$name}, welkom bij ZuZu."; break;
                        case $date >= 13 && $date < 18: echo "Goedemiddag{$name}, welkom bij ZuZu."; break;
                        default: echo "Goedenavond{$name}, welkom bij ZuZu."; break;
                    }
                ?>
            </h1>
        </div>
        <div class="col-12 text-center">
            <span class="fw-lighter">Wij zijn gespecialiseerd in de Japanse keuken</span>
            <p class="fw-lighter"> Het woord "sushi" is afkomstig van "su", wat azijn betekent en "shi" - rijst</p>
        </div>
        <div class="col-12 text-center">
            <span>
                <?php
                    setlocale(LC_ALL, 'dutch');
//                    date_default_timezone_set("Europe/Amsterdam");
                    // output
//
                    echo "Vandaag " . strftime("%A %d %B %Y", );
                ?>
            </span>
            <p class="">
                Bezorgtijd vanaf nu: <?php echo date("H") + 2 . ":" .date("i"); ?>
            </p>
        </div>
    </div>
    <div class=" row text-center mb-4">
        <div class="col d-flex justify-content-center">
            <div class="card " style="width: 100%; position: inherit !important;
            ">
               <a href="klantgegevens.php" style=" height:100%">
                   <div onmouseover="this.style.cursor='pointer'" class="card-img-top" id="img"
                     style="
                     height: 100%;
                     background: url('img/img1.jpeg');
                     background-size: cover;"

                >
                </div></a>
            <div class="card-body">
                <span class="card-text">Bestel bij ons je sushi</span>
            </div>
        </div>
    </div>
    <div class="col d-flex justify-content-center">
        <div class="card " style="width=100%; position: inherit !important;">
            <a href="klantgegevens.php"><img src="img/img2.webp" onmouseover="this.style
            .cursor='pointer'" class="card-img-top" alt="..."></a>
            <div class="card-body">
                <span class="card-text">Keuze uit verschillende soorten sushi's</span>
            </div>
        </div>
    </div>
    </div>
        <br>
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
                        <p class="m-0">zuzu@gmail.com</p>
                        <p class="m-0">06-12345678</p>
                    </div>
                    <div class="col mt-4">
                        <p class="m-0"><strong>Openingstijden</strong></p>
                        <p class="m-0">Maandag: <?php echo date("H") + 2 . ":" .date("i"); ?></p>
                        <p class="m-0">Dinsdag: <?php echo date("H") + 2 . ":" .date("i"); ?></p>
                        <p class="m-0">Woensdag: <?php echo date("H") + 2 . ":" .date("i"); ?></p>
                        <p class="m-0">Donderdag: <?php echo date("H") + 2 . ":" .date("i"); ?></p>
                        <p class="m-0">Vrijdag: <?php echo date("H") + 2 . ":" .date("i"); ?></p>
                        <p class="m-0">Zaterdag: <?php echo date("H") + 2 . ":" .date("i"); ?></p>
                        <p class="m-0">Zondag: <?php echo date("H") + 2 . ":" .date("i"); ?></p>
                    </div>
                </div>
            <div>
    </footer>
<!--end footer-->

</body>
<script>

    
    
</script>
</html>
