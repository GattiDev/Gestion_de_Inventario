<?php 
    include ('../../setting/database.php'); /* --> Importo la Base de Dato*/
    require_once "../models/main_model.php";

    $id_setting = $_POST['id_setting'];
    $pass = $_POST['pass'];

    $obj_get = new Get_Model();
    $data_setting = $obj_get->Get_setting($id_setting);

    while($get_setting = mysqli_fetch_assoc($data_setting)){ 
        $setting_administrator = $get_setting['administrator'];
        $setting_lincense = $get_setting['lincense'];
        $setting_date = $get_setting['date'];

        $obj_put= new Put_Model();
        $data_administrator = $obj_put->Put_administrator($id_setting, $setting_administrator, $pass, $setting_lincense, $setting_date);
    }
?>