// SCRIPT JAVASCRIPT de gestion des interactions dans la partie



// DEFINITION DES VARIABLES INITIALES

let t0 = Date.now();
let tenigme = 0;
$.cookie("room", 0);
$.cookie("enigme", 1);
$.cookie("tenigme", 0);
$.cookie("question", -1);
let game;
let times;  
let indices;
let delay_indices;
let timer;
$.ajax({
    url: 'request/get_game.php',
    type: 'POST',
    data: 'id='+$.cookie('game'),
    success:function(data){
        game = JSON.parse(data)[0];
        times = new Array(game['nbEnigme']);
        indices = JSON.parse(game['text_indices']);
        delay_indices = JSON.parse(game['delay_indices']);
        delay_indices.push(0);
        timer = setTimeout(function(){
            $("#indice").show();
        },delay_indices[$.cookie("enigme")]*1000);
    }
});


// DEFINTION DES FONCTIONS

function ReadTime(time) { //Fonction d'écriture standardisée du temps, utilisée par le timer
    let str = "";
    let sec = Math.floor(time%60000/1000);
    let min = Math.floor((time-sec)/60000);
    if (min!=0){
        str+=min+" minute";
        if(min>1)
            str+="s";
        if(sec!=0)
            str+=" - ";
    }
    if(sec!=0){
        str+=sec+" seconde"
    }
    if(sec>1)
        str+="s";
    return str;
}

function GiveIndice() { //Fonction d'affichage automatique des indices par click sur le bouton
    alert(indices[$.cookie('enigme')]);
}

function NextEnigme(){ //Fonction qui permet de passer à l'énigme suivante
    clearInterval(timer);
    times[$.cookie('enigme')-1]=Date.now()-t0-tenigme; //Stock le temps de l'enigme précédente
    tenigme += times[$.cookie('enigme')-1];
    $("#indice").hide(); //Cache le bouton de requete d'indice
    $.cookie('enigme',parseInt($.cookie('enigme'))+1); //Change le cookie correspondant au numéro de l'enigme
    timer = setTimeout(function(){ //Ajout d'un timer pour l'affichage automatique du bouton de requete d'indice au bout d'un certain temps
        $("#indice").show();
    }, delay_indices[$.cookie('enigme')]*1000);
    $("#enigme").text("Enigme n°"+($.cookie('enigme'))); //Modifie le texte du cadre d'affichage du numéro de l'enigme en cours
}

// DEFINITON DES INTERACTIONS ET EVENTLISTENER

$("#indice").click(function(){ //Click sur le bouton de requete d'indice
    GiveIndice()
});

$("#switch").click(function(){ //Click sur l'interrupteur
    $("#dark").hide();
    $("#light").show();
    NextEnigme();
});
$("#zoomBackground").click(function(){ //Click sur le fond flou 
    $("#zoomBackground").hide();
    $("#lockerZoom").hide();
    $("#locker").show();
});

$("#locker").click(function(){ //Click sur le locker
    $("#zoomBackground").show();
    $("#lockerZoom").show();
    $("#locker").hide();
});

$("#button-verrou").click(function(){
    int=[];
    for (let i = 1; i < 5; i++)
        int.push($("#int"+i).val());
    if(int[0]==1 && int[1]==7 && int[2]==8 && int[3]==9){
        NextEnigme();
        for (let i = 0; i < times.length; i++)
            times[i]=Math.floor(times[i]/=1000);
        times = times.join(' - ');
        $.ajax({
            url: 'request/send_times.php',
            type: 'POST',
            data: { id: $.cookie('team'), times: times },
            success:function(){
                window.location = "victory.php";
            }
        });
    }
});

$("#inputteam").val($.cookie('team'));

$('form').bind("keypress", function(e) { //Empèche la soummision de la question au game-master par la touche ENTER
    if (e.keyCode == 13) {               
      e.preventDefault();
      return false;
    }
});

$("#message-button").click(function() { //Click sur le bouton de soumission du la question au game-master
    $.ajax({ //Requête AJAX d'envoi de la question au game-master dans la BDD
        url: "request/send_question.php",
        type: "POST",
        data: $("#message-form").serialize(),
        success:function(){
            $.ajax({ //Requête AJAX de récupération de l'id du message qui vient d'être envoyé au game-master
                url: "request/get_message_id.php",
                type: "POST",
                success:function(data){
                    $.cookie('question',parseInt(data)); //Stock l'id de la question posée dans les cookies
                    $("#question").hide(); //Cache le cadre d'affichage de la question posée
                    $("#question").text("Q : "+$("#message-text").val()); //Stock la question posée dans le cadre d'affichage de la question posée
                    $("#question").hide(); //Cache le cadre d'affichage de la question posée
                    $("#message-text").val(""); //Vide le texte de l'input de la question posée
                    $("#answer").text("Votre question a bien été envoyée !"); //Affiche un message de succès
                    $("#answer").show(); //Affiche un message de succès
                    setTimeout(function(){ //Cache le message de succès au bout de 5 secondes
                        $("#answer").hide();
                    }, 5000);
                }
            });
        }
    });
    return false; //Ce retour de false permet d'empêcher le rechargement de la page par click sur le bouton de soummision de la question
});

// DEFINITION DES TIMERS ET REQUETES REGULIERES DU JEU

setTimeout(function(){
    $("#titre1").hide(); //Cache le titre
    $("#indication1").show(); //Affiche l'indication
    $("#switch").show(); //Affiche l'interrupteur
    $("#enigme").show(); //Affiche le numéro d'énigme
    $("#timer").show(); //Affiche le timer
    $("#chat").show(); //Affiche le chat
}, 3000);

setInterval(function(){ //Chaque seconde
    $("#timer").text(ReadTime(Date.now()-t0)); //Incrémente le timer
},1000);

setInterval(function(){ //Chaque seconde
    if($.cookie('question')!=-1){ //Si une question a été posée au game-master
        $.ajax({ //Requête AJAX qui récupère la réponse du game-master à la question posée
            url: "request/get_answer.php",
            method: "POST",
            data: "id="+$.cookie('question'),
            success: function(data){
                if(data!=""){ // Si le game-master a répondu à la question posée
                    $("#answer").text("A : "+data); //Affichage de la réponse
                    $("#question").show(); //Affichage de la question
                    $("#answer").show(); //Affichage de la réponse
                }
            }
        });
    }
},1000);