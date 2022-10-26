

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
            data: {interval: 1},
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
        })
    },40000)

})