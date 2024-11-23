<?php 
    include ('../../setting/database.php');
    require_once "../../admin/models/admin_model.php";
    
    $obj_run = new Run_Model();
	$data_replenish = $obj_run->Run_replenish();
?>

<table id="TablaDetalle" class="datatable"> 
	<thead>
	    <tr> 
			<th>Código</th>
			<th>Producto | Descripción</th>	
			<th>Cant.</th>
            <th>F.Pedido</th>
			<th>F.Repuso</th>
		</tr>
	</thead>
			
	<tbody>
		<?php 
			while ($get_replenish = mysqli_fetch_assoc($data_replenish)) {
                if($get_replenish['add_date'] == '0000-00-00'){  
				    echo "<tr>";
                        echo "<td >" . $get_replenish['code'] . "</td>";
                    
                    	//---> Obtengo el nombre del producto 
			            $obj_get = new Get_Model();
			            $data_producto = $obj_get->Get_productCode($get_replenish['code']);
			            while ($get_producto = mysqli_fetch_assoc($data_producto)) { 
					    echo "<td >" . $get_producto['product_description'] . "</td>";
					}
                        echo "<td>" . $get_replenish['amount'] . "</td>";
							 
					    $order_date = $get_replenish['order_date'];
    				    $OrderDate = date("d/m/Y", strtotime($order_date));
					    echo "<td>" . $OrderDate . "</td>";    
                        echo "<td>00/00/0000</td>";         
    				echo "</tr>";
                }
			} 
        ?>			
	</tbody>
</table>

<!--/ Js /-->
<script type="text/javascript" src="<?php echo AD_JS;?>table/tb_detalle.js"></script>

<script>
	const TB_detalle = new TableDetalle('#TablaDetalle', [] );
	TB_detalle.parse();
</script>
