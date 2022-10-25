$(document).ready(function(){
    $("#chatSend").on("click", function () {
        $val = $("#bericht").val();
        $bericht = `<div class="row justify-content-end ">
                    <div  class="text-dark mx-4 mt-2 d-flex flex-row-reverse chatbox p-2 rounded rounded-3
                    "
                         style="
                    max-width: 55%;
                    width: auto;
                    font-size: .9rem;
                    word-break: break-word;
                    background: #efefef;
                    
                ">
                        ${$val}
                    </div>
                </div>`;
        if($val !== ""){
            $("#chatbox").append($bericht);


            $("#bericht").val('');
            $.ajax({
                url: 'chat.php',
                type: 'POST',
                data: {chat: $val, count: 1},
                success: function(result){
                    $replay = ` <div class="row justify-content-start">
                    <div  class="text-light bg-primary mx-4 mt-2 chatbox p-2 rounded rounded-3
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
                    $("#chatbox").scrollTop($("#chatbox")[0].scrollHeight);
                }
            })};





    })

    setInterval(function(){


        $.ajax({
            url: 'chat.php',
            type: 'POST',
            data: {interval: 1},
            success: function(result){
                $replay = ` <div class="row justify-content-start">
                    <div  class="text-light bg-primary mx-4 mt-2 chatbox p-2 rounded rounded-3
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
                $("#chatbox").scrollTop($("#chatbox")[0].scrollHeight);
            }
        })
    },7000)


})