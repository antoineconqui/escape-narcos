document.getElementById("login").addEventListener("click", function(){
    document.getElementById("login").classList.add("selected");
    document.getElementById("register").classList.remove("selected");
    document.getElementById("login-content").hidden = false;
    document.getElementById("register-content").hidden = true;
});

document.getElementById("register").addEventListener("click", function(){
    document.getElementById("login").classList.remove("selected");
    document.getElementById("register").classList.add("selected");
    document.getElementById("login-content").hidden = true;
    document.getElementById("register-content").hidden = false;
});