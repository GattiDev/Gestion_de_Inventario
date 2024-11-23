<?php
    include ('../setting/database.php');
	require_once "models/admin_model.php";
  
    //--> Box <--
    $obj_run = new Run_Model();
    $data_box = $obj_run->Run_box();
    
    while ($get_box = mysqli_fetch_assoc($data_box)) { 

        //--> Product <--
        $obj_get = new Get_Model();
        $data_product = $obj_get->Get_productBox($get_box['box']);
        
        $namBox = '';
        $num = 0;

        while ($get_product = mysqli_fetch_assoc($data_product)) { 

            $num += $get_product['stock'];

            $obj_up = new Update_Model();
            $data_box2 = $obj_up->Update_BoxStock($get_box['box'], $num);
        
        }
    }
    
    $obj_delete = new Delete_Model();
    $data_delete = $obj_delete->DeleteTotal_datagraph();

    $obj_deleteAreaPolar = new Delete_Model();
    $data_deleteAreaPolar = $obj_deleteAreaPolar->DeleteTotal_Graph_AreaPolar();

    echo "<script>";
        echo " window.location.href = 'calculate_main.php'";
    echo "</script>";



?>