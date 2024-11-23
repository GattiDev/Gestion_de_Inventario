<?php 
    include ('../../setting/database.php'); /* --> Importo la Base de Dato*/
    require_once "../models/admin_model.php";
     
    $id_box = $_POST['id_box'];
    $stock_min = $_POST['stock_min'];
    $stock_cri = $_POST['stock_crit'];
    
    if($id_box != 0){
        if($stock_min >= 0){
                
            // Update Caja Producto Minimo
            $obj_update = new Update_Model();
            $data_box = $obj_update->Update_IdBox($id_box, $stock_min, $stock_cri);
            return var_dump(true);
                       
        }else{
            return var_dump(false);
        }   
         
    }else{
        return var_dump(false);
    }   
?>