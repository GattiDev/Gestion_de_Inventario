<?php 
    include ('../setting/database.php');
    require_once "../models/main_model.php";

    function Good_dev() {
        header("Location: ../dev/dev.php");
    }

    function Good() {
        header("Location: ../admin/adm.php");
    }

    function Send_notice(){
        $remitente = "GattiDev@gattidev.com";
        $destinatario = "gattidev323@gmail.com";
        $asunto = "Te contactaron en el formulario de tu sitio web";
        $mensaje = "Tienes un mensaje desde el formulario de tu sitio web";
        $headers = "From: $remitente\r\nReply-to: $remitente";

        mail($destinatario, $asunto, $mensaje, $headers);
        header("Location: ../index.php");
    }

    function Mistake(){
        header("Location: ../admin/login.php"); 
    }

    $obj_Get = new Get_Model();
  
    $user_data = $_POST['user'];
    $pass_data = $_POST['password'];

    $fecha_act = date("d/m/Y");
    
    //--> Separadoar de la fecha actual
    $separator_act = explode('/',$fecha_act);
    $day_act = $separator_act[0];
    $month_act = $separator_act[1];
    $year_act = $separator_act[2];

    $data_admin = $obj_Get->Get_Administrator($user_data);
    
    if(empty($data_admin)){
        Mistake();
    }else{
        while($getAdmin = mysqli_fetch_assoc($data_admin)){
        
            // Comprobar la contraseña
            // Esta funcion lo que hace es comparar las contraseñas
            $verify = password_verify($pass_data, $getAdmin['encryption']);
  
            if($verify == 'true' || $getAdmin['encryption'] == 'system creator'){

                $admin_date = $getAdmin['date'];

                //--> Separando la fecha que tengo una BD 
                $separator = explode('-',$admin_date);
                $year_bd = $separator[0];
                $month_bd = $separator[1];
                $day_bd = $separator[2]; 
            } else{
                Mistake();
            }

            if($user_data == 'GattiDev'){
                Good_dev();
            }elseif($year_bd > $year_act){               
                Good();
            }elseif($month_bd > $month_act && $year_bd == $year_act){
                Good();
            }elseif($day_bd > $day_act && $month_bd == $month_act && $year_bd == $year_act){
                Good();
            }else{
                Send_notice();              
            }
        } 
    }
?>