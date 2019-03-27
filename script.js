let player = 1;

$("#zoomBackground").click(function(){
    $("#zoomBackground").hide();
    $("#launch_game").hide();
});

$("#add_player").click(function(){
    player++;
    $("#player"+player).show();
    if (player==4)
        $("#add_player").hide();
});