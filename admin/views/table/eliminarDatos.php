<?php 
    include ('../../chart_apirest/db/conexion.php');
    
    $date_actual = date("Y");
    
    $date_eliminar = ($date_actual - 1);

    $conexion =  Conectar($db);
   
    $sql1 = $conexion->prepare("DELETE FROM `sold_detail` WHERE `year` = $date_eliminar");
    $sql1->execute();

    echo "<script>";
        echo " window.location.href = '../../update_data.php'";
    echo "</script>";
?>
