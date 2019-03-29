$.ajax({
    url: "get_game.php",
    method: "POST",
    data: "id="+$.cookie('game'),
    success: function(data){
        games = JSON.parse(data);
        $(".rules p").text(games[0]['rules']);
    }
});