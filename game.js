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
    document.getElementById("indice").hidden = false;
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
    document.getElementById("indice").hidden = true;

    enigme++;
    timer = setInterval(function(){
        document.getElementById("indice").hidden = false;
    }, time_indices[enigme]*1000);
    document.getElementById("enigme").textContent = "Enigme n°"+(enigme+1);
}

// ACTIONS

document.getElementById("indice").addEventListener("click", function(){
    GiveIndice();
});

document.getElementById("interrupteur").addEventListener("click", function(){
    document.getElementById("obscurite").hidden = true;
    document.getElementById("lumiere").hidden = false;
    NextEnigme();
});

document.getElementById("zoomBackground").addEventListener("click", function(){
    document.getElementById("zoomBackground").hidden = true;
    document.getElementById("verrouZoom").hidden = true;
    document.getElementById("verrou").hidden = false;
});

document.getElementById("verrou").addEventListener("click", function(){
    document.getElementById("zoomBackground").hidden = false;
    document.getElementById("verrouZoom").hidden = false;
    document.getElementById("verrou").hidden = true;
});

$("#message-button").click(function() {
    $.ajax({
           type: "POST",
           url: "message.php",
           data: $("#message-form").serialize(),
           success: function(data)
           {
           }
         });
    return false;
});

// TIMERS

setTimeout(function(){
    document.getElementById("titre1").hidden = true;
    document.getElementById("indication1").hidden = false;
    document.getElementById("interrupteur").hidden = false;
    document.getElementById("enigme").hidden = false;
    document.getElementById("timer").hidden = false;
    document.getElementById("chat").hidden = false;
}, 3000);

window.setInterval(function(){
    document.getElementById("timer").textContent = ReadTime(Date.now()-t0);

},1000);