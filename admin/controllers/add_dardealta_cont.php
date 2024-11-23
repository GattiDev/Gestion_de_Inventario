<?php 
    include ('../../setting/database.php'); /* --> Importo la Base de Dato*/
    require_once "../models/admin_model.php";
     
    $code = $_POST['codeHDA'];
    $amount = $_POST['amount'];

    $add_date = '';
    $ReplenishAmount = '';
    $obj_get = new Get_Model();
    $data_replenish = $obj_get->Get_replenishCode($code);

    while($get_replenish = mysqli_fetch_assoc($data_replenish)){
        $add_date = $get_replenish['add_date'];
        $ReplenishAmount = $get_replenish['amount'];
    }
    
    if($add_date == '0000-00-00'){

        $obj_get2 = new Get_Model();
        $data_product = $obj_get2->Get_productCode($code);

        while($get_product = mysqli_fetch_assoc($data_product)){

            $stock_act = $get_product['stock'];
            $replenish_act = $get_product['replenish_product'];
            $box = $get_product['box'];
        
            if($replenish_act == 'yes'){
                
                if($amount == $ReplenishAmount){
                    $suma = ($stock_act + $amount);

                    $obj_update1 = new Update_Model();
                    $data_dardeAlta = $obj_update1->Update_dardeAlta($code, $suma);
                                          
                    $obj_update2 = new Update_Model();
                    $data_replenish2 = $obj_update2->Update_replenish($code);

                    return var_dump('true');
                }else{
                    return var_dump('Error - Cantidad Ingresada Incorrecta.');
                }
            }else{
                return var_dump('Error - Pedido no realizado.');
            }
        }
    }  
?>