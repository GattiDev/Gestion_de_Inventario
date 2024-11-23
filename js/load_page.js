'use strict';
var TimeMouse = 50;

window.setInterval(function(){
   
    document.onmousemove = function(){
        TimeMouse = 50;
    };

    console.log(TimeMouse);

    if(TimeMouse == 0){        
        setTimeout(function(){       
		    location.href = "index.php"; 
        }, 6000);
    }else{
        TimeMouse--;
    }  
},1200);