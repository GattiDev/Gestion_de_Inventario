<?php
    include ('../setting/database.php');
	require_once "models/admin_model.php";
    
    //--> BOX STOCK <---
    $obj_box = new Run_Model();
    $data_box = $obj_box->Run_Box();
    while ($get_box = mysqli_fetch_assoc($data_box)) { 
            
        //--> Variables
        $box = $get_box['box'];
        $stock = $get_box['stock'];
        $critical = $get_box['critical_product'];
        $minimun = $get_box['minimun_product'];
                
        //--> Condición para el Stock
        if($stock < $critical){            
            $obj_updateBS = new Update_Model();
            $data_BoxStatu = $obj_updateBS->Update_BoxStatu($box, '-');  
                    
            $obj_updateReplenishP = new Update_Model();
            $data_ReplenishP = $obj_updateReplenishP->Update_ProductStatu($box, '-');
        }else{
            $obj_updateBS = new Update_Model();
            $data_BoxStatu = $obj_updateBS->Update_BoxStatu($box, 'not');  
                   
            $obj_updateReplenishP = new Update_Model();
            $data_ReplenishP = $obj_updateReplenishP->Update_ProductStatu($box, 'not');   
        }
			
        //--> Condición para eliminar
        if($stock == 0 && $minimun == 9999){
            //Delete_box
            $obj_deleteB = new Delete_Model();
            $data_Box = $obj_deleteB->Delete_box($box); 

            //Get_product
            $obj_getP = new Get_Model();
            $data_product = $obj_getP->Get_productBox($box); 
            while ($get_product = mysqli_fetch_assoc($data_product)) { 
                $deleteBox = $get_product['code']; 
            }
            //Delete_product
            $obj_deleteP = new Delete_Model();
            $dataproduct = $obj_deleteP->Delete_product($deleteBox); 
        } 
    } 

    echo "<script>";
        echo " window.location.href = 'replenish_main.php'";
    echo "</script>";
?>