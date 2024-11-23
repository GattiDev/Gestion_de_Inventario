<?php 	
    include ('../../setting/database.php');
    require_once "../models/admin_model.php";

    $code_supplier = $_POST['code_supplier'];

    $obj_delete = new Delete_Model();
    $data_supplier = $obj_delete->Delete_supplier($code_supplier);
?>