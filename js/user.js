

$(document).ready(function(){

    $("#chatSend").on("click", function () {
        $val = $("#bericht").val();
        $bericht = `<div class="row justify-content-end ">
                    <div  class="text-dark mx-4 mt-2 bg-light row  chatbox p-2 rounded rounded-3
                    "
                                          style="
                    max-width: 55%;
                    width: auto;
                    font-size: .9rem;
                    word-break: break-word;
                    
                ">
                                        ${$val}
                                    </div>
                                </div>
                </div>`;
        if($val !== ""){
            $("#chatbox").append($bericht);
            $("#chatting").scrollTop($("#chatting")[0].scrollHeight);}


        $("#bericht").val('');
        $.ajax({
            url: '../user/request.php',
            type: 'POST',
            data: {chat: $val, count: 1},
            success: function(result){
                $replay = ` <div class="row justify-content-start ">
                                    
                                    <div  class="text-white  mx-4 mt-2 bg-primary row  chatbox p-2 rounded rounded-3
                    "
                                          style="
                    max-width: 55%;
                    width: auto;
                    font-size: .9rem;
                    word-break: break-word;
                    
                ">
                                        ${result}
                                    </div>
                                </div>`;
                if(result !== ""){
                    $("#chatbox").append($replay);}
                // when chat goes down the scroll bar automatically comes to the bottom
                $("#chatting").scrollTop($("#chatting")[0].scrollHeight);
            }
        });





    })

    setInterval(function(){


        $.ajax({
            url: '../user/request.php',
            type: 'POST',
            data: {chatInterval: 1},
            success: function( response){
                $res  =JSON.parse(response)
                let naam = $res.naam
                let id = $res.id
                $replay = ` <div id="klanten" class="  border border-light p-3  d-flex border-start-0 border-end-0 border-top-0"
                    onclick="this.style.background = '#212529'" onmouseover="this.style.cursor='pointer'
                    this.style.filter ='brightness(80%)' " onmouseleave="this.style.filter ='brightness(100%)'">
                        <img src="../img/blank.jpg" class="col-4 rounded rounded-circle"  style="max-width: 5vw">
                        <div class="ms-3 mt-2 " style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                            <p class="fw-bold mb-1"> ${naam}</p>
                            <span class="overflow-hidden mt-1 fw-lighter text-light" >
                                <small id="${id}"></small></span>
                        </div>
                    </div>`;
                console.log("hello")
                if(naam !== null){
                    $("#sidechat").append($replay);}
                // when chat goes down the scroll bar automatically comes to the bottom
                $("#chatting").scrollTop($("#chatting")[0].scrollHeight);
            }
        })
    },4000)

    setInterval(function(){


        $.ajax({
            url: '../user/request.php',
            type: 'POST',
            data: {bericht: 1},
            success: function(berichtInterval){
                $replay = ` <div class="row justify-content-start ">
                                    
                                    <div  class="text-white  mx-4 mt-2 bg-primary row  chatbox p-2 rounded rounded-3
                    "
                                          style="
                    max-width: 55%;
                    width: auto;
                    font-size: .9rem;
                    word-break: break-word;
                    
                ">
                                        ${berichtInterval}
                                    </div>
                                </div>`;
                if(berichtInterval !== ""){
                    $("#chatbox").append($replay);}
                // when chat goes down the scroll bar automatically comes to the bottom
                $("#chatting").scrollTop($("#chatting")[0].scrollHeight);
            }
        })
    },40000)

})