'use strict'
  
var data_add = "";
    

//--> Supplier
$('#btn_supplier_add').click(function(){
    data_add=$('#frm_supplier').serialize();

    $.ajax({
        type:"POST",
        data:data_add,
        url:"controllers/add_supplier_cont.php",
        success:function(r){
            let posicion = r.indexOf("true");
            if (posicion !== -1){
                $('#frm_supplier')[0].reset();
                alertify.success("¡ Se agregó a la tabla con éxito. !");		
                timer();			
            }else{
                alertify.error("¡ Código duplicado o Valor incorrecto. !");
            }
        }
    });       
});
        
//--> Product
$('#btn_product_add').click(function(){
    data_add=$('#frm_product').serialize();
    
    $.ajax({
        type:"POST",
        data:data_add,
        url:"controllers/add_product_cont.php",
        success:function(r){
            let posicion = r.indexOf("true");
            if (posicion !== -1){
                $('#frm_product')[0].reset();
                alertify.success("¡ Se agregó a la tabla con éxito. !");
                timer();					
            }else{
                alertify.error("¡ Código duplicado o Valor incorrecto. !");
            }
        }
    });
});

//--> Deposito
$('#btn_deposito_add').click(function(){
    data_add=$('#frm_deposito').serialize();
    
    $.ajax({
        type:"POST",
        data:data_add,
        url:"controllers/add_deposito_cont.php",
        success:function(r){
            let posicion = r.indexOf("true");
            if (posicion !== -1){
                $('#frm_deposito')[0].reset();
                alertify.success("¡ Se agregó a la tabla con éxito. !");
                timer();					
            }else{
                alertify.error("¡ Código duplicado o Valor incorrecto. !");
            }
        }
    });
});


//--> Dar de Baja
$('#btn_soldDetail_add').click(function(){
    data_add=$('#frm_dardebaja').serialize();
    
    $.ajax({
        type:"POST",
        data:data_add,
        url:"controllers/add_soldDetail_cont.php",
        success:function(r){
            let true_1 = r.indexOf("True - Facturado.");
            if (true_1 !== -1){
                $('#frm_dardebaja')[0].reset();
                alertify.success("¡ Se vendió con éxito. !");
                timer();					
            }else{
                alertify.error("¡ Datos no validos. !");
            }
        }
    });
});

//--> Retoner
$('#btn_retoner_add').click(function(){
    data_add=$('#frm_retoner').serialize();
    
    $.ajax({
        type:"POST",
        data:data_add,
        url:"controllers/add_replenish_cont.php",
        success:function(r){
            console.log(r);
            let posicion56 = r.indexOf("true");
            if (posicion56 !== -1){
                $('#frm_retoner')[0].reset();
                alertify.success("¡ Se agregó a la tabla con éxito. !");
                timer();					
            }

            let error_replenish_1 = r.indexOf("Error - El Pedido ya esta realizado.");
            if (error_replenish_1 !== -1){
                alertify.error("¡ El Pedido ya esta realizado. !");
            }
        }
    });
});


//--> Dar de alta

$('#btn_dardealta_add').click(function(){
    data_add=$('#frm_dardealtaP').serialize();
    
    $.ajax({
        type:"POST",
        data:data_add,
        url:"controllers/add_dardealta_cont.php",
        success:function(r){

            let posicion56 = r.indexOf("true");
            if (posicion56 !== -1){
                $('#frm_dardealtaP')[0].reset();
                alertify.success("¡ Se agregó con éxito. !");
                timer();					
            }

            
            let error_replenish_1 = r.indexOf("Error - Cantidad Ingresada Incorrecta.");
            if (error_replenish_1 !== -1){
                alertify.error("¡ Ingrese la cantidad que indica en Detalles. !");
               
            }
        
            let error_replenish_2 = r.indexOf("Error - Pedido no realizado.");
            if (error_replenish_2 !== -1){
                alertify.error("¡ Deve realizar el pedido primero. !");
                
            }
        }
    });
}); 
