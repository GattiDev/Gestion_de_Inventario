<?php 
    include ('../../setting/database.php'); /* --> Importo la Base de Dato*/
    require_once "../models/admin_model.php";
    
    $code = $_POST['edit_codeH'];
    $supplier = $_POST['edit_supplier'];
    $phone = $_POST['edit_phone'];
    $mail = $_POST['edit_mail'];
  
    if($_POST['edit_phone'] == ''){
        $phone = '-';
    }else{
        $phone = $_POST['edit_phone'];
    }

    if($_POST['edit_mail'] == ''){
        $mail = '-';
    }else{
        $mail = $_POST['edit_mail'];
    }
    
    $obj_update = new Update_Model();
    $data_supplier = $obj_update->Update_supplier($code, $supplier, $phone, $mail);

?>