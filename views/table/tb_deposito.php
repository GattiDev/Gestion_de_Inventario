<?php 
    include ('../../setting/database.php');
    require_once "../../models/main_model.php";

    $obj_run = new Run_Model();
	$data_deposit = $obj_run->Run_Deposit();
?>

<nav id="section_button">	

	<a class='menu-btn' style='text-decoration: none; color: black;' href="<?php echo AD_VIEWS; ?>deposito.php" target='_blank'>
    	<i class='fa-solid fa-file-pdf'></i>
    	<span class='title'>Archivo</span>
	</a>
</nav>

<table id="TB_Deposito" class="datatable"> 
	<thead> 
	    <tr> 
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
<script type="text/javascript" src="<?php echo JS_URL;?>table/tb_deposito.js"></script>

<script>
	const TB_Deposito = new Table_Deposito('#TB_Deposito', [] );
	TB_Deposito.parse();
</script>
