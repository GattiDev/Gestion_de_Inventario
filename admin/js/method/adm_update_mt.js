'use strict'

var datos_edit = "";

//-----> Supplier 
$('#btn_supplier_edit').click(function(){
    datos_edit=$('#frm_UpdateSupplier').serialize();
	$.ajax({
	    type:"POST",
		data:datos_edit,
		url:"controllers/upd_supplier_cont.php",
		success:function(r){
            let posicion = r.indexOf("true");
            if (posicion !== -1){
                $('#frm_UpdateSupplier')[0].reset();
                alertify.success("¡ Se actualizo correctamente. !");	
                 timer();				
            }else{
                alertify.error("¡ Código duplicado o Valor incorrecto. !");
            }
        }
    });
});

//-----> Dar de Alta
$('#btn_dar_de_alta').click(function(){
    datos_edit=$('#frm_editDardeAlta').serialize();
    $.ajax({
        type:"POST",
        data:datos_edit,
        url:"controllers/upd_dardealta_cont.php",
        success:function(r){
            let result = r.indexOf("True");
            // True
            if (result !== -1){
                $('#frm_editDardeAlta')[0].reset();
                alertify.success("¡ Se agregó con éxito. !");
                timer();					
            }

            let result_E = r.indexOf("Error");
            if (result_E !== -1){
                // Error
                alertify.error("¡ Código duplicado o Valor incorrecto. !");   
            }
        }
    });
});

//-----> Depósito
$('#btn_deposito').click(function(){
    datos_edit=$('#frm_editDeposito').serialize();
    $.ajax({
        type:"POST",
        data:datos_edit,
        url:"controllers/upd_deposito_cont.php",
        success:function(r){
            let result = r.indexOf("True");
            // True
            if (result !== -1){
                $('#frm_editDeposito')[0].reset();
                alertify.success("¡ Se agregó con éxito. !");
                timer();					
            }

            let result_E = r.indexOf("Error");
            if (result_E !== -1){
                // Error
                alertify.error("¡ Código duplicado o Valor incorrecto. !");   
            }
        }
    });
});

//--> ID Caja Stock
$('#btn_cajaStock_upd').click(function(){
    data_add=$('#frm_cajastock').serialize();
    
    $.ajax({
        type:"POST",
        data:data_add,
        url:"controllers/upd_Idcaja_cont.php",
        success:function(r){
            let posicion = r.indexOf("true");
            if (posicion !== -1){
                $('#frm_cajastock')[0].reset();
                alertify.success("¡ Se agregó a la tabla con éxito. !");
                timer();					
            }else{
                alertify.error("¡ Stock Mín. ya están ingresados. !");
            }
        }
    });
});

//--> Caja Stock Minimun
$('#btn_cajaStockMinimun_upd').click(function(){
    datos_edit=$('#frm_cajastockM').serialize();
    
    $.ajax({
        type:"POST",
        data:datos_edit,
        url:"controllers/upd_cajaMinimun_cont.php",
        success:function(r){
            let result = r.indexOf("true");
            if (result !== -1){
                $('#frm_cajastockM')[0].reset();
                alertify.success("¡ Se agregó a la tabla con éxito. !");
                timer();					
            }else{
                alertify.error("¡ Error en los datos. !");
            }
        }
    });
});

//-----> Sold Detail 
$('#btn_soldDetail_upd').click(function(){
    datos_edit=$('#frm_editSoldetail').serialize();
    $.ajax({
        type:"POST",
        data:datos_edit,
        url:"controllers/upd_soldDetail_cont.php",
        success:function(r){
            console.log(r);
            // True
            let true_1 = r.indexOf("True - Se agregó.");
            if (true_1 !== -1){
                $('#frm_editSoldetail')[0].reset();
                alertify.success("¡ Se agregó con éxito. !");
                timer();					
            }

            let error_2 = r.indexOf("Error - Supera la cantidad actual.");
            if (error_2 !== -1){
            
                alertify.error("¡ Supera la cantidad actual, ingrese una cantidad correcta. !");
               
            }

            let error_3 = r.indexOf("Error - Cantidad no Ingresada.");
            if (error_3 !== -1){
            
                alertify.error("¡ Cantidad no Ingresada, ingrese un N°. !");
               
            }
        }
    });
});