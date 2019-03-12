document.getElementById("single").addEventListener("click", function(){
    document.getElementById("multi").classList.remove("selected");
    document.getElementById("single").classList.add("selected");
    document.getElementById("multi-content").hidden = true;
    document.getElementById("single-content").hidden = false;
});

document.getElementById("multi").addEventListener("click", function(){
    document.getElementById("multi").classList.add("selected");
    document.getElementById("single").classList.remove("selected");
    document.getElementById("multi-content").hidden = false;
    document.getElementById("single-content").hidden = true;
});

document.getElementById("create").addEventListener("click", function(){
    document.getElementById("join").classList.remove("selected");
    document.getElementById("create").classList.add("selected");
});

document.getElementById("join").addEventListener("click", function(){
    document.getElementById("join").classList.add("selected");
    document.getElementById("create").classList.remove("selected");
});