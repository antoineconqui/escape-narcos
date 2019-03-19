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

function dragElement(elmnt) {
    var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
    if (document.getElementById(elmnt.id + "header"))
        document.getElementById(elmnt.id + "header").onmousedown = dragMouseDown;
    else
        elmnt.onmousedown = dragMouseDown;
  
    function dragMouseDown(e) {
      e = e || window.event;
      e.preventDefault();
      pos3 = e.clientX;
      pos4 = e.clientY;
      document.onmouseup = closeDragElement;
      document.onmousemove = elementDrag;
    }
  
    function elementDrag(e) {
      e = e || window.event;
      e.preventDefault();
      pos1 = pos3 - e.clientX;
      pos2 = pos4 - e.clientY;
      pos3 = e.clientX;
      pos4 = e.clientY;
      elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
      elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
    }
  
    function closeDragElement() {
      document.onmouseup = null;
      document.onmousemove = null;
    }
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

dragElement(document.getElementById("cocaine_1"));

// document.getElementById("goTo1From2").addEventListener("click", function(){
//     room = 1;
//     document.getElementById("room1").hidden = false;
//     document.getElementById("room2").hidden = true;
//     document.getElementById("room3").hidden = true;
// });

// document.getElementById("goTo2From1").addEventListener("click", function(){
//     room = 2;
//     document.getElementById("room1").hidden = true;
//     document.getElementById("room2").hidden = false;
//     document.getElementById("room3").hidden = true;
// });

// document.getElementById("goTo2From3").addEventListener("click", function(){
//     room = 2;
//     document.getElementById("room1").hidden = true;
//     document.getElementById("room2").hidden = false;
//     document.getElementById("room3").hidden = true;
// });

// document.getElementById("goTo3From2").addEventListener("click", function(){
//     room = 3;
//     document.getElementById("room1").hidden = true;
//     document.getElementById("room2").hidden = true;
//     document.getElementById("room3").hidden = false;
// });

// TIMERS

setTimeout(function(){
    document.getElementById("titre1").hidden = true;
    document.getElementById("interrupteur").hidden = false;
    document.getElementById("enigme").hidden = false;
    document.getElementById("timer").hidden = false;
    document.getElementById("chat").hidden = false;
}, 3000);

window.setInterval(function(){
    document.getElementById("timer").textContent = ReadTime(Date.now()-t0);

},1000);