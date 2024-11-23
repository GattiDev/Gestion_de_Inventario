<?php 
  include ('../../setting/database.php'); /* --> Importo la Base de Dato*/
  require_once "../models/admin_model.php";

  $code = $_POST['edit_codeDaHD'];
  $codealt = $_POST['edit_codealtD'];
  $productdescrip = $_POST['edit_productdescripD'];
  $amount = $_POST['edit_amount'];
  $place = $_POST['edit_place'];

  if($place != '' && $productdescrip != ''){
         
    $obj_put = new Update_Model();
    $data_deposito = $obj_put->Update_deposito($code, $codealt, $productdescrip, $amount, $place);
    
    return var_dump('True');

  }else{
    return var_dump('Error'); 
  }
?>