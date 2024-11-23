<?php
    include ('../setting/database.php');
	require_once "models/admin_model.php";
  
    //--> Ejecuto Replenish <--
    $obj_run = new Run_Model();
    $data_replenish = $obj_run->Run_replenish();
    
    while ($get_replenish = mysqli_fetch_assoc($data_replenish)) { 

        if($get_replenish['add_date'] == '0000-00-00'){

            $code = $get_replenish['code'];  
            $obj_get = new Get_Model();
            $data_product = $obj_get->Get_productCode($code);
                
            while ($get_product = mysqli_fetch_assoc($data_product)) { 

                $code = $get_product['code'];
                $obj_updateRP = new Update_Model();
                $data_replenishProduct = $obj_updateRP->Update_replenishProduct($code, 'yes');  
            }
        }
    }
    echo "<script>";
        echo " window.location.href = 'calculateGraph.php'";
    echo "</script>";
?>