'use strict'

$(document).ready(function(){
    var datos_edit = "";


    //#####################################################################################################//
                   //#############################---> ADMINISTRATOR <---#############################//
    //#####################################################################################################//

    //-----> Manager 
    $('#btn_Up_administrator').click(function(){
	    datos_edit=$('#frm_UPadministrator').serialize();
	    $.ajax({
		    type:"POST",
		    data:datos_edit,
		    url:"controllers/upd_administrator.php",
		    success:function(r){
                
                let posicion = r.indexOf("true");
                if (posicion !== -1){
                    $('#frm_UPadministrator')[0].reset();
                    alertify.success("¡ Se actualizo correctamente. !");	
                    timer();				
                }

                //---> Error
                let erro_fecha = r.indexOf("Error - Fecha");
                if (erro_fecha !== -1){
                    alertify.error("¡ Fecha incorrecta. !");
                }
            }
        });
    });

});