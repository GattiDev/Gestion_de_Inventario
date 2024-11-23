<?php 
    $date_actual = date("Y");
    $Get_Model_24 = new Get_Model();
    $Get_SoldDetail_24 = $Get_Model_24-> Get_SoldDetail($code, $date_actual);

    $January = 0;
    $February = 0;
    $March = 0;
    $April = 0;
    $May = 0;
    $June = 0;
    $July = 0;
    $August = 0;
    $September = 0;
    $Octuber = 0;
    $November = 0;
    $December = 0;
    
    $year = 0;
    $total = 0;

    while($data_solddetail_24 = mysqli_fetch_assoc($Get_SoldDetail_24)){ 

        $cantida = $data_solddetail_24['amount'];
        $date = $data_solddetail_24['date'];

        //--> Obtengo el mes
        $mes = substr($date, -5, 2);
        //--> Elimino el 0 de la Izquierda
        $mes = ltrim($mes, "0");
        //--> Obtengo el año
        $year = substr($date, 0, 4);

        if($mes == 1){
            $January += $cantida;
            $cantida = 0;
        }
        if($mes == 2){
            $February += $cantida;
            $cantida = 0;
        }
        if($mes == 3){
            $March += $cantida;
            $cantida = 0;
        }
        if($mes == 4){
            $April += $cantida;
            $cantida = 0;
        }
        if($mes == 5){
            $May += $cantida;
            $cantida = 0;
        }
        if($mes == 6){
            $June += $cantida;
            $cantida = 0;
        }
        if($mes == 7){
            $July += $cantida;
            $cantida = 0;
        }
        if($mes == 8){
            $August += $cantida;
            $cantida = 0;
        }
        if($mes == 9){
            $September += $cantida;
            $cantida = 0;
        }
        if($mes == 10){
            $Octuber += $cantida;
            $cantida = 0;
        }
        if($mes == 11){
            $November += $cantida;
            $cantida = 0;
        }
        if($mes == 12){
            $December += $cantida;
            $cantida = 0;
        }                                 
    }

    $total = ($January + $February + $March + $April + $May + $June + $July + $August + $September + $Octuber + $November + $December);


    if($total != 0){

        $Put_Model_24 = new Put_Model();
        $put_datagraph_24 = $Put_Model_24->Put_datagraph($code, $description, $January, $February, $March, $April,
            $May, $June, $July, $August, $September, $Octuber, $November, $December, $year, $total);
    
        
            $SubTotal += $total;

        echo "<script> var confirmar = confirm('Volver al Inicio !');";
            echo " if (confirmar){";
                echo " window.location.href = 'adm.php'";
            echo "}";
                echo " window.location.href = 'adm.php'";
        echo "</script>";
    }
   

?>