<?php 	
    include ('../../setting/database.php'); /* --> Importo la Base de Dato*/
    require_once "../models/main_model.php";
    
    $obj_imge = new Delete_Model();

    $id_image = $_POST['id_image'];

    $del_image = $obj_imge->Delete_image($id_image);
?>