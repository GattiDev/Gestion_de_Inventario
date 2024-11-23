<?php 
    include ('../../setting/database.php');
    require_once "../../admin/models/admin_model.php";
    
    $obj_run = new Run_Model();
	$data_product = $obj_run->Run_Product(); 
?>
        
<table id="TablaProductCritical" class="datatable"> 
    <thead>
        <tr> 
            <th>Código</th>
            <th>Código Alt.
            <th>Producto | Descripción</th>
            <th>Stock</th>
            <th></th>
        </tr>
    </thead>
                   
    <tbody>
                            
        <?php 
            while ($get_product = mysqli_fetch_assoc($data_product)) { 
                       
                if($get_product['replenish_product'] == '-'){
                    echo "<tr>";
                        echo "<td>" . $get_product['code'] . "</td>";
                        echo "<td>" . $get_product['alternate_code'] . "</td>";
                        echo "<td>" . $get_product['product_description'] . "</td>";
                        echo "<td>" . $get_product['stock'] . "</td>";
                               
        	            if($get_product['priority'] == 'yes'){
				            echo "<td><i class='fa-solid fa-star'></i></td>";
						}
                        if($get_product['priority'] == 'not'){ 
							echo "<td><i class='fa-solid fa-star-half'></i></td>";
						}
                        if($get_product['priority'] == 'x'){ 
							echo "<td><i class='fa-solid fa-trash'></i></td>";
						}
                    echo "</tr>";
                }
            }
        ?>			
    </tbody>
</table>
        
<!--/ Js /-->
<script type="text/javascript" src="<?php echo JS_URL;?>table/tb_Stockcritical.js"></script>
        
<script>
    const TB_ProductCritical = new TableCritical('#TablaProductCritical', [] );
    TB_ProductCritical.parse();
</script>    
