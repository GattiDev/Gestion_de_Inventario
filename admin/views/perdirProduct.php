<?php 
    include ('../../setting/database.php');
    require_once "../models/admin_model.php";
?>

<nav id="section_button">	
    

<?php 
    /* ---> Recorro <--- */
    $obj_run2 = new Run_Model();
    $data_Supplier = $obj_run2->Run_supplier();

	while ($get_supplier = mysqli_fetch_assoc($data_Supplier)) { 
        //--> Creo una Array para guardar el primer N° que esta en la Caja
        $Order = array();

		$obj_get = new Get_Model();
	 	$data_productOrder = $obj_get->Get_productOrder($get_supplier['id']);

	 	while ($get_productOrder = mysqli_fetch_assoc($data_productOrder)) { 

			$code = $get_productOrder['code'];

		 	//--> Guardo los codigo en el Array
		 	$Order[] = $get_productOrder['code'];
		}

        //--> Cuento cuanto datos tengo en mi Array
        $canti = count($Order);

        if($canti != 0){ ?>
        
        <div class="pedido" style='display: inline-block !important; width: 250px !important;'>
            
            <h3 style='color: white !important; letter-spacing: 2px !important; text-shadow: 2px -1px 2px black !important;'><?php echo $get_supplier['supplier'];?></h3>  
              
            <a class='menu-btn' style='text-decoration: none; color: black;' href="<?php echo AD_VIEWS; ?>viewsOrder.php?data=<?php echo $get_supplier['id']; ?>" target='_blank'>
                <i class='fa-solid fa-star fa-beat-fade'></i>
                <span class='title'><?php echo $canti;?></span>
            </a>

            <!-- Para que se haga el pedido o se mande el pedido automatico -->
            <!--<a class='menu-btn' style='text-decoration: none; color: black;' href="<?php echo AD_VIEWS; ?>makeAnOrder.php?data=<?php echo $get_supplier['id']; ?>">
                <i class="fa-solid fa-truck-arrow-right"></i>-->
            </a>
        </div>
        <?php }
	}


?>
<br/>
<a class='menu-btn' style='text-decoration: none; color: black;' href="<?php echo AD_VIEWS; ?>control_general.php" target='_blank'>
    <i class='fa-solid fa-star fa-beat-fade'></i>
    <span class='title'>Control general</span>
</a>
</nav>