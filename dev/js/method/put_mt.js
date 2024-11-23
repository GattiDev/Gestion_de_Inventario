'use strict'
//#####################################################################################################//
            //#############################---> PUT <---#############################//
//#####################################################################################################//
$(document).ready(function(){
    
    var data_add = ""; 
    
    //-----> License 
    $('#btn_setting_add').click(function(){
        
        data_add=$('#frm_setting').serialize();

        $.ajax({
            type:"POST",
            data:data_add,
            url:"controllers/add_setting.php",
            success:function(r){
                let posicion = r.indexOf("true");
                if (posicion !== -1){
                    $('#frm_setting')[0].reset();
                    alertify.success("¡ Se agregó a la tabla con éxito. !");		
                    timer();			
                }else{
                    alertify.error("¡ Admin duplicado o Valor incorrecto. !");
                }
            }
        }); 
    });

    //----> Administrators
    $('#btn_administrator_add').click(function(){
        
        data_add=$('#frm_administrator').serialize();

        $.ajax({
            type:"POST",
            data:data_add,
            url:"controllers/add_administrator.php",
            success:function(r){
                console.log(r)
                let posicion = r.indexOf("true");
                if (posicion !== -1){
                    $('#frm_administrator')[0].reset();
                    alertify.success("¡ Se agregó a la tabla con éxito. !");		
                    timer();			
                }else{
                    alertify.error("¡ Admin duplicado o Valor incorrecto. !");
                   
                }
            }
        }); 
    });
});