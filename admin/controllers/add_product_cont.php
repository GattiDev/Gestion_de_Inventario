<?php 
    include ('../../setting/database.php'); /* --> Importo la Base de Dato*/
    require_once "../models/admin_model.php";
     
    $id_supplier = $_POST['id_supplier'];
    $code = $_POST['code'];
    $code_al = $_POST['code_al'];
    $product_descrip = $_POST['product_descrip'];
    $stock = $_POST['stock'];
    $box = $_POST['box'];
    
    if(($id_supplier != '0') && ($code != '')){
        if($code_al == ''){
            $code_al = '-';
        }

        if(($product_descrip != '') && ($stock >= 0) && ($box != '') && (strpos($box, 'Caja_') !== false)){
            $obj_put1 = new Put_Model();
            $data_product = $obj_put1->Put_product($id_supplier, $code, $code_al, $product_descrip, $stock, $box); 
           
            $obj_put2 = new Put_Model();
            $data_box = $obj_put2->Put_box($box);  

        }else{
            return var_dump(false);
        }
    }else{
        return var_dump(false);
    }
    
?>