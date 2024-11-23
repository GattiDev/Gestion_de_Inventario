<?php 
    include ('../../setting/database.php'); /* --> Importo la Base de Dato*/
    require_once "../models/admin_model.php";
    
    $code = $_POST['code'];
    $supplier = $_POST['supplier'];

    if($_POST['phone'] == ''){
        $phone = '-';
    }else{
        $phone = $_POST['phone'];
    }

    if($_POST['mail'] == ''){
        $mail = '-';
    }else{
        $mail = $_POST['mail'];
    }

    $obj_put = new Put_Model();
	$data_supplier = $obj_put->Put_supplier($code, $supplier, $phone, $mail);
?>