<?php
    session_start();
    include_once "../db.php";
    $getKlant = $chat->prepare("SELECT `id` , `naam` FROM `klant` WHERE `chat` = 1");
    if($getKlant->execute()) {
        $klanten = $getKlant->fetchAll(PDO::FETCH_ASSOC);
    }
    
    
    
    
    
    if(!isset($_SESSION["login"]) && $_SESSION["login"] !== true){
        header("location: ../login.php");
        exit;
    }
	
	

?>


<html>
<head>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
	      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
	        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
	        crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<title>ZUZU-Admin</title>
</head>
<!-- omdat er geen css file gebruikt mocht worden heb ik het zo gedaan-->

<style >
    #klanten{
        transition: .3s;
        transition-timing-function: ease-in-out;
    }

    #klanten:hover{
        filter: brightness(80%);
        cursor:pointer;
    }
    html {
        width: 100%;
        height: 100%;
    }

    body {
        background-image: url("../img/bglight.svg");
    }
</style>
<body class="bg-light h-100 bg-img text-light">
<!--navbar-->
<nav class=" index  position-sticky top-0 navbar navbar-expand-lg navbar-light bg-dark ">
    <div class="container-fluid">
        <a class="navbar-brand text-light" href="../index.php">ZUZU</a>
        <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link active text-light" aria-current="page" href="../index.php">Home</a>
                <span class="nav-link active text-light" onmouseover="this.style.cursor='pointer'">Log uit</span>
            </div>
        </div>
    </div>
</nav>
<!--end navbar-->
	<div class="d-flex justify-content-center py-5  mt-3 align-items-center" style="height:90vh;">
		<div class="card border-0 rounded rounded-2 mb-3 h-100 bg-dark" style=" min-height: 60vh; ">
			<div class="row g-0 h-100 " style="">
				<div id="sidechat" class="col-md-4 links h-100  bg-secondary  overflow-scroll rounded-start" style="width:
				23vw; overflow-x: hidden !important;">
                    
                    
                    <?php
                    
                        if(isset($klanten)){
                            foreach($klanten as $key=>$value){
                                foreach($value as $key=>$value){
                                    
                                    if(!intval($value)){
                                        echo "<div id='klanten' class='  border border-light p-3  d-flex border-start-0 border-end-0 border-top-0'
                                        onclick='this.style.background =". '"#212529"'."'>
                                            <img src='../img/blank.jpg' class='col-4 rounded rounded-circle'  style='max-width: 5vw'>
                                            <div class='ms-3 mt-2 ' style='white-space: nowrap; overflow: hidden; text-overflow: ellipsis;'>
                                                <p class='fw-bold mb-1'> {$value}</p>
                                                <span class='overflow-hidden mt-1 fw-lighter text-light' >
                                                    <small id='previewBericht'>erdoklredoiklerosdklercreikmdrekddosiklecdsklm</small></span>
                                            </div>
                                        </div>";
                                    }
                                }
                            }
                        }
                    
                    ?>
                    
                    
				</div>
				<div class="col-md-4 h-100">
					<div class="card-body p-0" style="width: 40vw">
                        
                        <div id="chatting"  class="overflow-scroll  h-100 ps-3 pb-5 pt-4 " style="overflow-x: hidden !important;">
                            <div id="chatbox" class="pb-5 mb-4 text-wrap">
                                <div class="row justify-content-start ">
                                    
                                    <div  class="text-white  mx-4 mt-2 bg-primary row  chatbox p-2 rounded rounded-3
                    "
                                          style="
                    max-width: 55%;
                    width: auto;
                    font-size: .9rem;
                    word-break: break-word;
                    
                ">
                                        type 1 voor  admin en 0 voor klant.
                                    </div>
                                </div>
                            
                            
                            
                            </div>
					    </div>
                        <div class="position-relative">
                            <div class="   position-absolute bottom-0 w-100 bg-light  ps-3 py-2 overflow-hidden "
                                 style="
                 
                    box-shadow: 0 -4px 7px 1px rgba(0, 0, 0, .2);
                   " >
                                <form class="row ms-4 " >
                                    <input id="bericht" class="form-control p-2 m-2 " placeholder="Uw vraag of bericht.
                                    ..."
                                           name="chat"
                                           style="
                        width:19rem !important;
                        
                    " required>
                                    <button id="chatSend" type="submit" name="chatSubmit" class="btn btn-primary
                                    col-3 p-3  ms-2 my-2"
                                            >Verzenden</button>
        
                                </form>
                            </div>
                        </div>
                        
				</div>
			</div>
		</div>
	</div>
</body>
<script src="../js/user.js">
</script>
</html>
