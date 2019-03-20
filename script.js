let game=0;
let player=1;

document.getElementById("game-pablo-house").addEventListener("click", function(){
    game=0;
    document.getElementById("zoomBackground").hidden = false;
    document.getElementById("launch_game").hidden = false;
});

document.getElementById("game-catedral").addEventListener("click", function(){
    game=1;
    document.getElementById("zoomBackground").hidden = false;
    document.getElementById("launch_game").hidden = false;
});

document.getElementById("zoomBackground").addEventListener("click", function(){
    document.getElementById("zoomBackground").hidden = true;
    document.getElementById("launch_game").hidden = true;
});

document.getElementById("add_player").addEventListener("click", function(){
    player++;
    document.getElementById("player"+player).hidden = false;
    if (player==4)
        document.getElementById("add_player").hidden = true;

});