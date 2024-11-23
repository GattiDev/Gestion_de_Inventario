<?php 
    include ('../../../setting/database.php');
    require_once "../../models/admin_model.php";

    $obj_run = new Run_Model();
	$data_product = $obj_run->Run_Product();
?>

<table id="TablaProductDA" class="datatable"> 
	<thead>
	    <tr> 
			<th>Check</th>
            <th>Código</th>
			<th>Cód. alt.</th>
			<th>Producto | Descripción</th>
			<th>Stock</th>
			<th>Caja</th>
			<th></th>
		</tr>
	</thead>
			
	<tbody>
		<?php 
			while ($get_product = mysqli_fetch_assoc($data_product)) { ?>
				
				<tr>						
					<td><?php echo $get_product['code']; ?></td>
					<td><?php echo $get_product['alternate_code']; ?></td>
					<td><?php echo $get_product['product_description']; ?></td>
					<td><?php echo $get_product['stock']; ?></td>
					<td><?php echo $get_product['box']; ?></td>
					<?php 
						if($get_product['priority'] == 'yes'){
							echo "<td><i class='fa-solid fa-star'></i></td>";
						}elseif($get_product['priority'] == 'x'){ 
							echo "<td><i class='fa-solid fa-trash'></i></td>";
						}else{
							echo "<td><i class='fa-solid fa-star-half'></i></td>";
						}	
					?>
				</tr>
			<?php } 
        ?>			
	</tbody>
</table>

<!--/ Js /-->
<script type="text/javascript" src="<?php echo AD_JS;?>table/btn_dardeAlta.js"></script>

<script>
	const TB_DardeAlta = new TableButton_DardeAlta('#TablaProductDA', [
		{
			id: 'bEdit',
			text: 'Edit',
			icon: 'fa-solid fa-user-gear',
			toggle: 'modal',
			target: '#edit_product',
			action: function(){
				const row_product = TB_DardeAlta.getDatos();	
				get_product(row_product);
			}													
		},
		{
			id: 'bDelete',
			text: 'Delete',
			icon: 'fa-solid fa-trash-can-arrow-up',
			toggle: 'modal',
			target: '#delete_product',
			action: function(){
				const row_deleteproduct = TB_DardeAlta.getSelected();	
				delete_product(row_deleteproduct);
			}													
		},
	] );
	TB_DardeAlta.parse();
</script>
