let register = true;

document.getElementById("register").addEventListener("click", function(){
    document.getElementById("login").classList.remove("selected");
    document.getElementById("register").classList.add("selected");
    register = true;
});

document.getElementById("login").addEventListener("click", function(){
    document.getElementById("login").classList.add("selected");
    document.getElementById("register").classList.remove("selected");
    register = false;
});