<?php 
    include ('../../../setting/database.php');
    require_once "../../models/admin_model.php";
    
    $obj_run = new Run_Model();
	$data_product = $obj_run->Run_product();
?>

<table id="TablaProductDB" class="datatable"> 
	<thead>
	    <tr> 
			<th>Check</th>
			<th>Código</th>
            <th>Cód. alt.</th>
			<th>Producto | Descripción</th>
			<th>Stock</th>
		</tr>
	</thead>
			
	<tbody>
		<?php 
			while ($get_product = mysqli_fetch_assoc($data_product)) { ?>

				<tr>
					<td class="table-checkbox"><input type="checkbox" name="" id=""></td>
					<td><?php echo $get_product['code']; ?></td>
					<td><?php echo $get_product['alternate_code']; ?></td>
					<td><?php echo $get_product['product_description']; ?></td>
                   	<td><?php echo $get_product['stock']; ?></td>			
				</tr>
				
			<?php }
		?>			
	</tbody>
</table>

<!--/ Js /-->
<script type="text/javascript" src="<?php echo AD_JS;?>table/btn_dardeBaja.js"></script>

<script>
	
	const TB_DardeBaja = new TableButton_DardeBaja('#TablaProductDB', [
		{
			id: 'bAdd',
			text: 'Add',
			icon: 'fa-solid fa-sack-dollar',
			toggle: 'modal',
			target: '#add_dardebaja',
			action: function(){
				const row_dardebaja = TB_DardeBaja.getDatos();	
				get_productB(row_dardebaja);	
			}
		},
	]);
	
	TB_DardeBaja.parse();
</script>