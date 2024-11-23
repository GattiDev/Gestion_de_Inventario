<?php
    //---> IMPORTACIONES 
    include('../../../setting/database.php');
    require_once "../../../admin/models/admin_model.php";

    $obj_get = new Get_Model();
    $data_productOrder = $obj_get->Get_productSupplier($_GET["data"]);

    while ($get_product = mysqli_fetch_assoc($data_productOrder)) { 
        
        $code = $get_product['code'];
        $product_description = $get_product['product_description'];
        $box = $get_product['box'];
                 
        if($get_product['replenish_product'] == '-'){

            $obj_get = new Get_Model();
            $data_box = $obj_get-> Get_Box($box);

            while ($get_box = mysqli_fetch_assoc($data_box)) { 
                $amount = 0;
                   
                if($get_box['minimun_product'] != 9999){
                    $stock = $get_box['stock'];
                    $minimun = $get_box['minimun_product'];
            
                    $amount = $minimun - $stock;
                }
                
                $obj_put = new Put_Model();
                $data_replenish = $obj_put->Put_replenish($code, $product_description, $amount);      
                
            }

            if($get_product['replenish_product'] == 'not'){

                $obj_get = new Get_Model();
                $data_box = $obj_get-> Get_Box($box);

                while ($get_box = mysqli_fetch_assoc($data_box)) { 
                    $amount = 0;
                    
                    if($get_box['minimun_product'] != 9999){

                        if($get_box['stock'] < $get_box['minimun_product'] && $get_box['stock'] > $get_box['critical_product']){
            
                            $box = $get_box['box'];
                            $stock = $get_box['stock'];
                            $minimun = $get_box['minimun_product'];
            
                            $amount = $minimun - $stock;
                                   
                            if($amount != 0){

                                $obj_put = new Put_Model();
                                $data_replenish = $obj_put->Put_replenish($code, $product_description, $amount);      
                            
                                $obj_upd = new Update_Model();
                                $data_ProductStatu = $obj_upd->Update_ProductStatu($box, 'yes');      
                            
                            }
                        }
                    }
                }
            }   
        }    
    }

    echo "<script>";
        echo " window.location.href = '../../update_data.php'";
    echo "</script>";
?>