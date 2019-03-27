// VARIABLES INITIALES

let t0 = Date.now();
let time_indices = [10,15];
let indices = [
    "Trouvez l'interrupteur.",
    "Trouvez un moyen d'ouvrir la porte."   
];
let times = [];
let room = 1;
let enigme = 0;
let tenigme = 0;
let timer = setInterval(function(){
    $("#indice").show();
},time_indices[enigme]*1000);

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
    alert(indices[enigme]);
}

function NextEnigme(){
    clearInterval(timer);
    times[enigme]=Date.now()-times[enigme-1];
    $("#indice").hide();

    enigme++;
    timer = setInterval(function(){
        $("#indice").show();
    }, time_indices[enigme]*1000);
    $("#enigme").text("Enigme n°"+(enigme+1));
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

$("#message-button").click(function() {
    $.ajax({
        url: "message.php",
        type: "POST",
        data: $("#message-form").serialize()
    });
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

window.setInterval(function(){
    $("#timer").text(ReadTime(Date.now()-t0));
},1000);