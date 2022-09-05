
<html lang="html">
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
                crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/style.css">
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
            if(isset($_POST["bestel"])){

                echo $_POST["makiKomkommer"];
            }
        ?>
        <div class="w-50 fw-bold">
            <form method="post">

                <div class="mb-3  ">
                    <label for="exampleInputEmail1" class="form-label">
                        Maki komkommer <small class="fw-light fst-italic">(max = 5)</small>
                    </label>
                    <input type="text" class="form-control" name="makiKomkommer">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">
                        Maki Avocado <small class="fw-light fst-italic">(max = 10)</small>
                    </label>
                    <input type="text" class="form-control" name="makiAvocado">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">
                        Nigiri zalm <small class="fw-light fst-italic">(max = 10)</small>
                    </label>
                    <input type="text" class="form-control" name="nagiriZalm">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">
                        Philadelphia Roll <small class="fw-light fst-italic">(max = 5)</small>
                    </label>
                    <input type="text" class="form-control" name="philadelphiaRoll">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">
                        Spicy Tuna Roll <small class="fw-light fst-italic">(max = 5)</small>
                    </label>
                    <input type="text" class="form-control" name="spicyTunaRoll">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">
                        California Roll <small class="fw-light fst-italic">(max = 8)</small>
                    </label>
                    <input type="text" class="form-control" name="californiaRoll">
                </div>
                <button type="submit" class="btn btn-dark" name="bestel">Verzenden</button>
            </form>

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

    </script>
</html>
