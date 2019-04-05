// SCRIPT JAVASCRIPT de gestion des interactions dans le lancement de partie

let player = 1;

$("#zoomBackground").click(function(){ //On créé un eventListener de click sur le fond flou
    $("#zoomBackground").hide(); //Masque le fond flou
    $("#launch_game").hide(); //Masque le cadre de lancement de partie
});

$("#add_player").click(function(){ //On créé un eventListener de click sur le bouton "Ajout de joueur"
    player++;
    $("#player"+player).show(); //Affiche successivement les input de nouveaux joueurs dans le formulaire
    if (player==4) //Limite le nombre de joueur à 4
        $("#add_player").hide(); //Cache le bouton d'ajout de joueur
});