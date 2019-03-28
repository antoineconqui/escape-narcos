// VARIABLES INITIALES

let t0 = Date.now();
let time_indices = [10,15];
let indices = [
    "Trouvez l'interrupteur.",
    "Trouvez un moyen d'ouvrir la porte."   
];
let times = [];
$.cookie("room", 0);
$.cookie("enigme", 1);
$.cookie("tenigme", 0);
$.cookie("question", -1);
let tenigme = 0;
let timer = setTimeout(function(){
    $("#indice").show();
},time_indices[$.cookie("enigme")]*1000);

// FONCTIONS

function ReadTime(time) {
    let str = "";
    let sec = Math.floor(time%60000/1000);
    let min = Math.floor((time-sec)/60000);
    if (min!=0){
        str+=min+" minute";
        if(min>1)
            str+="s";
        str+=" - ";
    }
    str+=sec+" seconde"
    if(sec>1)
        str+="s";
    return str;
}

function GiveIndice() {
    alert(indices[$.cookie('enigme')]);
}

function NextEnigme(){
    clearInterval(timer);
    times[$.cookie('enigme')]=Date.now()-times[$.cookie('enigme')-1];
    $("#indice").hide();
    $.cookie('enigme',parseInt($.cookie('enigme'))+1);
    timer = setTimeout(function(){
        $("#indice").show();
    }, time_indices[$.cookie('enigme')]*1000);
    $("#enigme").text("Enigme n°"+($.cookie('enigme')));
}

// ACTIONS
$("#indice").click(function(){
    GiveIndice()
});

$("#interrupteur").click(function(){
    $("#obscurite").hide();
    $("#lumiere").show();
    NextEnigme();
});
$("#zoomBackground").click(function(){
    $("#zoomBackground").hide();
    $("#verrouZoom").hide();
    $("#verrou").show();
});

$("#verrou").click(function(){
    $("#zoomBackground").show();
    $("#verrouZoom").show();
    $("#verrou").hide();
});

$('form').bind("keypress", function(e) {
    if (e.keyCode == 13) {               
      e.preventDefault();
      return false;
    }
});

$("#message-button").click(function() {
    $.ajax({
        url: "send_message.php",
        type: "POST",
        data: $("#message-form").serialize(),
        success:function(){
            $.ajax({
                url: "get_message_id.php",
                type: "POST",
                success:function(data){
                    $.cookie('question',parseInt(data));
                }
            });
        }
    });
   
    $("#question").hide();
    $("#question").text("Q : "+$("#message-text").val());
    $("#message-text").val("");
    $("#answer").text("Votre question a bien été envoyée !");
    setTimeout(function(){
        $("#answer").text("");
    }, 5000);
    return false;
});

// TIMERS

setTimeout(function(){
    $("#titre1").hide();
    $("#indication1").show();
    $("#interrupteur").show();
    $("#enigme").show();
    $("#timer").show();
    $("#chat").show();
}, 3000);

setInterval(function(){
    $("#timer").text(ReadTime(Date.now()-t0));
},1000);

setInterval(function(){
    if($.cookie('question')!=-1){
        $.ajax({
            url: "get_answer.php",
            method: "POST",
            data: "id="+$.cookie('question'),
            success: function(data){
                if(data!=""){
                    $("#question").show();
                    $("#answer").text("A : "+data);
                }
            }
        });
    }
},1000);