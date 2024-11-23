<?php
    include ('../../setting/database.php');
    require_once "../models/main_model.php";

if(isset($_POST)){
    $destino = intval($_REQUEST['idDestino']); 
    $id_destiny = 0;

    if($destino != 0){
     
        if($destino == 1){ //---> Accesorios
            $id_destiny = $destino;
        }

        if($destino == 2){ //---> Banner
            $id_destiny = $destino;
        }

        if($destino == 3){ //---> Icono
            $id_destiny = $destino;
        }

        if($destino == 4){ //---> Logo
            $id_destiny = $destino;
        }

        if($destino == 5){ //---> Otras
            $id_destiny = $destino;
        }
    }

    if($id_destiny != 0){
        
        //Forma para guardar la imagen en la base de datos
        if (isset($_FILES['foto']['name'])) {
            
            $type = $_FILES['foto']['type'];
            $permitido=array("image/png","image/jpeg","image/x-icon");

            if( in_array($type,$permitido) == false ){
                echo '<script language="javascript">alert("Error - Extension de Archivo no permitido !!!");window.location.href="../dev.php"</script>';
            }

            $archive = $_FILES['foto']['name'];
            $tamanoArchivo = $_FILES['foto']['size'];
            $imagenSubida = fopen($_FILES['foto']['tmp_name'], 'r');
            $binaryImage = fread($imagenSubida, $tamanoArchivo);

        }
                                           
        $title = $_REQUEST['titulo'];
        $description = "-";
        $link = "-";
        $date = date("Y-m-d");


        $obj_Put = new Put_Model();
        $data_Image = $obj_Put->Put_image($title, $description, $archive, $binaryImage, $type, $link, $date, $id_destiny);
                
        echo '<script language="javascript">alert("Se agrego con exito !");window.location.href="../dev.php"</script>';
                 
    }else{
        echo '<script language="javascript">alert("Error - Debe selección un destino !!!");window.location.href="../dev.php"</script>';
    }
}
                  