<?php 
    include ('../../setting/database.php'); /* --> Importo la Base de Dato*/
    require_once "../models/admin_model.php";
    
    $code = $_POST['codeHFp'];
    $amount = $_POST['amount'];
    $stock = $_POST['StockH'];
    ///$id_product = 0;
  
    if($amount <= $stock){
                
        //--> Product - Code
        $obj_get = new Get_Model();
        $data_productCode = $obj_get->Get_productCode($code);
                
        while($get_productCode = mysqli_fetch_assoc($data_productCode)){ 
                 
            //$id_product = $get_productCode['id'];
            $amount_current = ($stock - $amount);
            
            if($amount_current >= 0 && $amount > 0){
                                   
                //--> SOLD DETAIL Facturado <--//
                $obj_put = new Put_Model();
                $data_sold_detail = $obj_put->Put_soldDetail($code, $amount);
    
                $obj_update = new Update_Model();
                $data_productStock = $obj_update->Update_productStock($code, $amount_current);
                  
                return var_dump('True - Facturado.');           
            }
        }
    }else{
        //Stock incorrecto
        return var_dump('False - Valor');
    }
?>