<?php 
    include ('../../../setting/database.php');
    require_once "../../models/admin_model.php";
    
    // Obtengo todo los datos de la Tabla de Productos
    $obj_run = new Run_Model();
	$data_supplier = $obj_run->Run_supplier();
?>

<table id="TableSupplier" class="datatable"> 
	<thead>
	    <tr> 
			<th>Check</th>
			<th>Código</th>
			<th>Proveedor</th>
			<th>Telefono</th>
            <th>Correo</th>
		</tr>
	</thead>
			
	<tbody>
		<?php 
			while ($get_supplier = mysqli_fetch_assoc($data_supplier)) { ?>
				<tr>
					<td class="table-checkbox"><input type="checkbox" name="" id=""></td>
					<td><?php echo $get_supplier['code_supplier']; ?></td>
					<td><?php echo $get_supplier['supplier']; ?></td>
					<td><?php echo $get_supplier['phone']; ?></td>
                    <td><?php echo $get_supplier['mail']; ?></td>
				</tr>
			<?php } 
        ?>			
	</tbody>
</table>

<!--/ Js /-->
<script type="text/javascript" src="<?php echo AD_JS;?>table/btn_supplier.js"></script>

<script>
	const TB_supplier = new TableButton_supplier('#TableSupplier', [
		{
			id: 'bEdit',
			text: 'Edit',
			icon: 'fa-solid fa-user-pen',
			toggle: 'modal',
			target: '#edit_supplier',
			action: function(){
				const row_supplier = TB_supplier.getDatos();	
				get_supplier(row_supplier);
			}													
		},
		{
			id: 'bDelete',
			text: 'Delete',
			icon: 'fa-solid fa-user-xmark',
			action: function(){
				const code_supplier = TB_supplier.getSelected();
				delete_supplier(code_supplier);
			}		
		},
	]);
	TB_supplier.parse();
</script>