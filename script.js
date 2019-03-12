document.getElementById("register").addEventListener("click", function(){
    document.getElementById("login").classList.remove("selected");
    document.getElementById("register").classList.add("selected");
});

document.getElementById("login").addEventListener("click", function(){
    document.getElementById("login").classList.add("selected");
    document.getElementById("register").classList.remove("selected");
});

document.getElementById("create").addEventListener("click", function(){
    document.getElementById("join").classList.remove("selected");
    document.getElementById("create").classList.add("selected");
});

document.getElementById("join").addEventListener("click", function(){
    document.getElementById("join").classList.add("selected");
    document.getElementById("create").classList.remove("selected");
});