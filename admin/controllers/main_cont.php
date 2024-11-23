<?php 
    
    /*function Statu() {
        //--> Ejecuto Replenish
        $obj_run = new Run_Model();
        $data_replenish = $obj_run->Run_replenish(); 

        while ($get_replenish = mysqli_fetch_assoc($data_replenish)) { 

            if($get_replenish['add_date'] == '0000-00-00'){

                $code = $get_replenish['code'];
                
                $obj_get = new Get_Model();
                $data_product = $obj_get->Get_productCode($code);
                    
                while ($get_product = mysqli_fetch_assoc($data_product)) { 

                    $code = $get_product['code'];
                    $obj_updateRP = new Update_Model();
                    $data_replenishProduct = $obj_updateRP->Update_replenishProduct($code, 'yes');                    
                }
            }
        }
    }

    function BoxStatu() {
        //--> Ejecuto Box
        $obj_run = new Run_Model();
        $data_box = $obj_run->Run_box();     

        while ($get_box = mysqli_fetch_assoc($data_box)) { 
   
            $box = $get_box['box'];

            $stock = $get_box['stock'];

            $critical = $get_box['critical_product'];
        
            $obj_get = new Get_Model();
            $data_productBox = $obj_get->Get_productBox($box);

            $obj_update = new Update_Model();
            $obj_updatePS = new Update_Model();
            $obj_delete = new Delete_Model();
            $obj_deleteP = new Delete_Model();

            if($stock < $critical){
                $data_BoxStatu = $obj_update->Update_BoxStatu($box, '-');
                $data_ProductStatu = $obj_updatePS->Update_ProductStatu($box, '-');
            }else{
                $data_BoxStatu = $obj_update->Update_BoxStatu($box, 'not');
                $data_ProductStatu = $obj_updatePS->Update_ProductStatu($box, 'not');
            }
        
            if($stock == 0 && $critical == 9999){
                
                $data_Box = $obj_delete->Delete_box($box);
                while ($get_productBox = mysqli_fetch_assoc($data_productBox)) { 
                    $code = $get_productBox['code'];
                    $data_Product = $obj_deleteP->Delete_productS($code);
                }
            }
        }
    }

    function Stock() {
        //--> Ejecuto Box
        $obj_run = new Run_Model();
        $data_box = $obj_run->Run_box();     

        while ($get_box = mysqli_fetch_assoc($data_box)) { 
       
            $box = $get_box['box'];

            $total = 0; 

            $obj_get = new Get_Model();
            $data_productBox = $obj_get->Get_productBox($box);
        
            while ($get_productBox = mysqli_fetch_assoc($data_productBox)) { 

                $amount = $get_productBox['stock'];

                $total += $amount;
            }
   
            $obj_update = new Update_Model();
            $data_BoxStock = $obj_update->Update_BoxStock($box, $total);
        }
    
        BoxStatu();

    }

    //--> Testeo del Stock
    Stock();
    //--> Comprobar los prodcutos que se pidieron
    Statu(); */
?>