<?php 	
    include ('../../setting/database.php'); /* --> Importo la Base de Dato*/
    require_once "../models/main_model.php";
    
    $obj_setting = new Delete_Model();
    $obj_administrator = new Delete_Model();

    $id_setting = $_POST['id_setting'];

    $del_administrator = $obj_administrator->Delete_administrator($id_setting);
    $del_setting = $obj_setting->Delete_setting($id_setting);
?>