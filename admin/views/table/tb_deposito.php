<?php 
    include ('../../../setting/database.php');
    require_once "../../models/admin_model.php";

    $obj_run = new Run_Model();
	$data_deposit = $obj_run->Run_Deposit();
?>

<table id="TablaDeposito" class="datatable"> 
	<thead>
	    <tr> 
			<th>Check</th>
            <th>Código</th>
			<th>Cód. alt.</th>
			<th>Producto | Descripción</th>
			<th>Cantidad</th>
			<th>Depósito</th>
		</tr>
	</thead>
			
	<tbody>
		<?php 
			while ($get_deposit = mysqli_fetch_assoc($data_deposit)) { ?>
				
				<tr>						
					<td><?php echo $get_deposit['code']; ?></td>
					<td><?php echo $get_deposit['alternate_code']; ?></td>
					<td><?php echo $get_deposit['product_description']; ?></td>
					<td><?php echo $get_deposit['amount']; ?></td>
					<td><?php echo $get_deposit['deposit']; ?></td>
				</tr>
			<?php } 
        ?>			
	</tbody>
</table>

<!--/ Js /-->
<script type="text/javascript" src="<?php echo AD_JS;?>table/btn_deposito.js"></script>

<script>
	const TB_Deposito = new TableButton_Deposito('#TablaDeposito', [
		{
			id: 'bEdit',
			text: 'Edit',
			icon: 'fa-solid fa-cubes',
			toggle: 'modal',
			target: '#edit_deposito',
			action: function(){
				const row_deposito = TB_Deposito.getDatos();	
				get_deposito(row_deposito);
			}													
		},
		{
			id: 'bDelete',
			text: 'Delete',
			icon: 'fa-solid fa-trash-can-arrow-up',
			toggle: 'modal',
			target: '#delete_deposito',
			action: function(){
				const row_deletedeposito = TB_Deposito.getSelected();	
				delete_deposito(row_deletedeposito);
			}													
		},
	] );
	TB_Deposito.parse();
</script>
