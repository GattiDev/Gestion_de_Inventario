<?php 
    include ('../../setting/database.php'); /* --> Importo la Base de Dato*/
    require_once "../models/main_model.php";
    
    $obj_administrator = new Update_Model();
    $obj_setting = new Update_Model();

    $id = $_POST['up_id'];
    $lincense = $_POST['up_licencia'];
    $up_fecha = $_POST['up_fecha'];
    
    $fecha_act = date("d/m/Y"); 
    
    //--> Separando la fecha que me mandaron 
    $separator = explode('-',$up_fecha);
    $year = $separator[0];
    $month = $separator[1];
    $day = $separator[2];

    //--> Separadoar de la fecha actual
    $separator_act = explode('/',$fecha_act);
    $day_act = $separator_act[0];
    $month_act = $separator_act[1];
    $year_act = $separator_act[2];
   
    if($year > $year_act){
        $data_administrator = $obj_administrator->Update_administrator($id, $lincense, $up_fecha);
        $data_setting = $obj_setting->Update_setting($id, $lincense, $up_fecha);
        return var_dump('true');
    }
    
    if($year = $year_act){
        if($month > $month_act){
            $data_administrator = $obj_administrator->Update_administrator($id, $lincense, $up_fecha);
            $data_setting = $obj_setting->Update_setting($id, $lincense, $up_fecha);
            return var_dump('true');
        }else{
            return var_dump('Error - Fecha'); 
        }  
    }else{
        return var_dump('Error - Fecha');
    }
?>