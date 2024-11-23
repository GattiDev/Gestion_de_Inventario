<?php 	
    include ('../../setting/database.php'); /* --> Importo la Base de Dato*/
    require_once "../models/admin_model.php";

    $code_deposito = $_POST['code_deposito'];

    $obj_delete = new Delete_Model();
    $data_deposito = $obj_delete->Delete_deposito($code_deposito);
?>