'use strict'
// ========== MAIN ========== //

var i = 0;

function login(){

    document.getElementById("boxInputName").style.transform = "translate(0px)";
    document.getElementById("boxInputName").style.marginLeft = "315px";
    document.getElementById("boxInputName").style.marginTop = "35px";
    document.getElementById("boxInputName").style.transition = "2.5s";
           
    document.getElementById("boxInputPass").style.transform = "translate(0px)";
    document.getElementById("boxInputPass").style.marginLeft = "315px";
    document.getElementById("boxInputPass").style.marginTop = "35px";
    document.getElementById("boxInputPass").style.transition = "2.5s";

    setInterval(function() {
        logins()
    }, 2000);
}

function logins(){
    
    for (i = 0; i <= 10; i++){
        setTimeout("document.getElementById('boxInputName').style.opacity = '" + (i / 10) + "'");
        setTimeout("document.getElementById('boxInputPass').style.opacity = '" + (i / 10) + "'");           
    }
}