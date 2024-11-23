<?php 
    include ('../../setting/database.php'); /* --> Importo la Base de Dato*/
    require_once "../models/main_model.php";

    $admin = $_POST['adm'];
    $lincense = $_POST['lincenseH'];
    $date = $_POST['fecha'];

    $obj_put = new Put_Model();
    $data_setting = $obj_put->Put_setting($admin, $lincense, $date);
   
?>