<?php 
    include ('../../setting/database.php'); /* --> Importo la Base de Dato*/
    require_once "../models/admin_model.php";
      
    $code = $_POST['code'];
    $code_al = $_POST['code_al'];
    $product_descrip = $_POST['product_descrip'];
    $amount = $_POST['amount'];
    $id_deposito = $_POST['id_deposito'];
    
    if(($id_deposito != '0') && ($code != '')){
        if($code_al == ''){
            $code_al = '-';
        }

        if(($product_descrip != '') && ($amount >= 0)){
            $obj_put = new Put_Model();
            $data_deposito = $obj_put->Put_deposito($id_deposito, $code, $code_al, $product_descrip, $amount); 
        
        }else{
            return var_dump(false);
        }
    }else{
        return var_dump(false);
    }
    
?>