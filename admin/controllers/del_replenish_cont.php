<?php 	
    include ('../../setting/database.php'); /* --> Importo la Base de Dato*/
    require_once "../models/admin_model.php";

    $code = $_POST['code_product'];

    $obj_get = new Get_Model();
    $data_replenish = $obj_get->Get_replenishCode($code);

    while($get_replenish = mysqli_fetch_assoc($data_replenish)){

        if($get_replenish['add_date'] == '0000-00-00'){

            $replenish_id = $get_replenish['id'];

            $obj_getCP = new Get_Model();
            $data_cp = $obj_getCP->Get_productCode($code);
 
            while($get_cp = mysqli_fetch_assoc($data_cp)){
                $id = $get_cp['id'];
                $box = $get_cp['box'];
    
                if($get_cp['replenish_product'] == 'yes'){
                           
                    $obj_update = new Update_Model();
                    $data_requestProduct = $obj_update->Update_replenishProduct($code, '');
                
                    //--> Delete Replenish
                    $obj_delete = new Delete_Model();
                    $data_replenish = $obj_delete->Delete_replenish($replenish_id);
                    
                    return var_dump('true');  
                }else{
                    return false;
                }
            }   
        }
    } 
?>