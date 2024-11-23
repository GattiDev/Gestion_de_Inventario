<?php 
  include ('../../setting/database.php'); /* --> Importo la Base de Dato*/
  require_once "../models/admin_model.php";

  $code = $_POST['edit_codeDaH'];
  $codealt = $_POST['edit_codealt'];
  $productdescrip = $_POST['edit_productdescrip'];
  $stock = $_POST['edit_stock'];
  $box = $_POST['edit_caja'];
  $priority = $_POST['edit_priority'];

  if($code != '' && $codealt != '' && $productdescrip != '' && (strpos($box, 'Caja_') !== false) && $priority == 'yes' || $priority == 'not' || $priority == 'x'){
    
    $obj_put1 = new Put_Model();
    $data_box = $obj_put1->Put_box($_POST['edit_caja']);       
    
    $obj_put2 = new Update_Model();
    $data_product = $obj_put2->Update_product($code, $codealt, $productdescrip, $stock, $box, $priority);
    
    return var_dump('True');

  }else{
    return var_dump('Error'); 
  }
?>