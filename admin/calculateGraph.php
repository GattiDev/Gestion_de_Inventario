<?php 
    include ('../setting/database.php'); /* --> Importo la Base de Dato*/
    require_once "models/admin_model.php";

        
    $Run_Model = new Run_Model();
	$Run_Product = $Run_Model->Run_Product();

    

	while($data_product = mysqli_fetch_assoc($Run_Product)){ 

        $code = $data_product['code'];
     
        $description = '';
        $SubTotal = 0;

        //--> Productos 
        $Get_ModelCode = new Get_Model();
        $Get_Code = $Get_ModelCode-> Get_productCode($code);
                
        while($data_code = mysqli_fetch_assoc($Get_Code)){
            $description = $data_code['product_description'];
        }  

//----> Year 
        include('calculateGraph/calculate_year.php');

        if($SubTotal != 0){ 
            $Put_Model = new Put_Model();
            $put_Graph_AreaPolar = $Put_Model->Put_Graph_AreaPolar($code, $description, $SubTotal);
        }
    }
?>