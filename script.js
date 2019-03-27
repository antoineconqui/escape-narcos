let game=0;
let player = 1;


$("#game-pablo-house").click(function(){
    game=0;
    $("#zoomBackground").show();
    $("#launch_game").show();
});

$("#game-catedral").click(function(){
    game=1;
    $("#zoomBackground").show();
    $("#launch_game").show();
});

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