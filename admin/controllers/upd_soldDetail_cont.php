<?php 
    include ('../../setting/database.php'); /* --> Importo la Base de Dato*/
    require_once "../models/admin_model.php";

    $id = $_POST['edit_idSD'];
    $code = $_POST['edit_HcodeSD'];
    $act = $_POST['edit_HamountSD'];
    $amount = $_POST['edit_amountSD'];
    
    $amout_act = 0;

    //--> Product - Code 
    $obj_get = new Get_Model();
    $data_product = $obj_get->Get_productCode($code);
    
    while($get_product = mysqli_fetch_assoc($data_product)){ 
        $amout_act = $get_product['stock'];
    }

    if($amount == 0 || $amount == ''){
        return var_dump('Error - Cantidad no Ingresada.');
    }

    if($amount <= $act){

        $numero = ($act - $amount);

        if($numero == 0){
            
            //--> Sumo
            $sum = ($amount + $amout_act);

            //--> Update Stock Product
            $obj_update1 = new Update_Model();
            $data_product1 = $obj_update1->Update_productStock($code, $sum); 
                    
            //--> Sold Detail
            $obj_delete = new Delete_Model();
            $data_soldDetail = $obj_delete->Delete_soldDetail($id);
                        
            return var_dump('True - Se agregó.'); 
        }

        if($numero > 0){
            //--> Sumo
            $sum = ($amount + $amout_act);

            //--> Update Stock Product
            $obj_update2 = new Update_Model();
            $data_product2 = $obj_update2->Update_productStock($code, $sum); 
                
            //--> Update Sold Detail
            $obj_update = new Update_Model();
            $data_soldDetail = $obj_update->Update_soldDetail($id, $numero);
        
            return var_dump('True - Se agregó.'); 
        }
    }else{
        return var_dump('Error - Supera la cantidad actual.');
    }
?>