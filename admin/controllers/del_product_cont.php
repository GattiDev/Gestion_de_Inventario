<?php 	
    include ('../../setting/database.php'); /* --> Importo la Base de Dato*/
    require_once "../models/admin_model.php";

    $code_product = $_POST['code_product'];

    $obj_delete = new Delete_Model();
    $data_product = $obj_delete->Delete_product($code_product);
?>