'use strict'

function delete_supplier(code_supplier){
   
    if(code_supplier > 0){
        
        alertify.confirm('Eliminar Proveedor', '¿Seguro que deseas eliminar a este Proveedor ?', function(){ 

            $.ajax({
                type:"POST",
                data:"code_supplier=" + code_supplier,
                url:"controllers/del_supplier_cont.php",
                success:function(r){
                    let posicion = r.indexOf("true");
                    if (posicion !== -1){
                        alertify.success("Se eliminado con exito !");
                        timer();
                    }else{
                        alertify.error("No se pudo eliminar...");
                    }
                }
            });
        }, function(){});
    }
}

function delete_product(code_product){
   
    alertify.confirm('Eliminar Producto', '¿Seguro que deseas eliminar este Producto ?', function(){ 
 
        $.ajax({
            type:"POST",
            data:"code_product=" + code_product,
            url:"controllers/del_product_cont.php",
            success:function(r){
                let posicion = r.indexOf("true");
                if (posicion !== -1){
                    alertify.success("Se eliminado con exito !");
                    timer();
                }else{
                    alertify.error("No se pudo eliminar...");
                }
            }
        });
    }, function(){});
}

function delete_deposito(code_deposito){
    alertify.confirm('Eliminar Depósito', '¿Seguro que deseas eliminar este Producto en el depósito ?', function(){ 
 
        $.ajax({
            type:"POST",
            data:"code_deposito=" + code_deposito,
            url:"controllers/del_deposito_cont.php",
            success:function(r){
                let posicion = r.indexOf("true");
                if (posicion !== -1){
                    alertify.success("Se eliminado con exito !");
                    timer();
                }else{
                    alertify.error("No se pudo eliminar...");
                }
            }
        });
    }, function(){});
}

function delete_replenish(code_product){

    alertify.confirm('Eliminar Pedido', '¿Seguro que deseas eliminar este Pedido ?', function(){ 
 
        $.ajax({
            type:"POST",
            data:"code_product=" + code_product,
            url:"controllers/del_replenish_cont.php",
            success:function(r){
                let posicion = r.indexOf("true");
                if (posicion !== -1){
                    alertify.success("Se eliminado con exito !");
                    timer();
                }else{
                    alertify.error("No se pudo eliminar...");
                }
            }
        });
     
    }, function(){});
}
