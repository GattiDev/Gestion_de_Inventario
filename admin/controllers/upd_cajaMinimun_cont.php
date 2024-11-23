<?php 
    include ('../../setting/database.php'); /* --> Importo la Base de Dato*/
    require_once "../models/admin_model.php";
     
    $box = $_POST['boxCsH'];
    $stock_min = $_POST['Cstock_min'];
    $stock_cri = $_POST['Cstock_cri'];
    
                
    // Update Caja Producto Minimo
    $obj_update = new Update_Model();
    $data_box = $obj_update->Update_boxMin($box, $stock_min, $stock_cri);                
    
?>