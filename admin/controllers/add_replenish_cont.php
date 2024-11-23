<?php 
    include ('../../setting/database.php'); /* --> Importo la Base de Dato*/
    require_once "../models/admin_model.php";
     
    $code = $_POST['codeHMR']; //--> Code 
    $amount = $_POST['amount']; //--> Amount a pedir

    $obj_get = new Get_Model();
    $data_product = $obj_get->Get_productCode($code);
    
    while ($get_product = mysqli_fetch_assoc($data_product)) { 
            
        if($get_product['replenish_product'] == 'yes'){
          
            return var_dump('Error - El Pedido ya esta realizado.');
            
        }else{
            $product_description = $get_product['product_description'];
            $obj_put = new Put_Model();
            $data_replenish = $obj_put->Put_replenish($code, $product_description, $amount);
            return var_dump('true'); 
        }	
    }     
?>