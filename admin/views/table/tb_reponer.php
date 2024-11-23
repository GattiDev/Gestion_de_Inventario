<?php 
    include ('../../../setting/database.php');
    require_once "../../models/admin_model.php";
?>
<nav id="section_button">	
    

<?php 
 //--> Creo una Array para guardar el primer N° que esta en la Caja
 $Order = array();
 /* ---> Recorro <--- */
 $obj_run2 = new Run_Model();
 $data_Supplier = $obj_run2->Run_supplier();

	while ($get_supplier = mysqli_fetch_assoc($data_Supplier)) { 

		$obj_get = new Get_Model();
	 	$data_productOrder = $obj_get->Get_productOrder($get_supplier['id']);

	 	while ($get_productOrder = mysqli_fetch_assoc($data_productOrder)) { 

			$code = $get_productOrder['code'];

		 	//--> Guardo los codigo en el Array
		 	$Order[] = $get_productOrder['code'];
		}
	}
 //--> Cuento cuanto datos tengo en mi Array
 $canti = count($Order);

?>

<a class="menu-btn" onclick="btn_perdir()">
	<span class="title">Hacer Pedido</span>
	<i class="fa-solid fa-star"></i>
	<span class="title"><?php echo $canti; ?></span>
</a>

</nav>
<table id="TablaReponer" class="datatable"> 
	<thead>
		<tr>
			<th>Check</th>
			<th>Estado</th>
			<th>Código</th>
            <th>Cód.Prov.</th>			
			<th>Producto | Descripción</th>
			<th>Stock</th>
		</tr>
	</thead>
		
	<tbody>
		<?php     
			$obj_run = new Run_Model();
			$data_product = $obj_run->Run_product();       
            while ($get_product = mysqli_fetch_assoc($data_product)) {  ?>

				<tr>
					<td class="table-checkbox"><input type="checkbox" name="" id=""></td>
						
					<?php
						if($get_product['replenish_product'] == 'not'){
							echo "<td><span class='offline'></span></td>  ";
						}

						if($get_product['replenish_product'] == '-'){
							echo "<td><span class='ask'></span></td>  ";
						}

						if($get_product['replenish_product'] == 'yes'){
							echo "<td><span class='order'></span></td>  ";
						}
					?>
							
					<td ><?php echo $get_product['code']; ?></td>    
					<td ><?php echo $get_product['alternate_code']; ?></td>          									
					<td ><?php echo $get_product['product_description']; ?></td>
					<td ><?php echo $get_product['stock']; ?></td>
				</tr>
			<?php }
		?>			
	</tbody>
</table>

<!--/ Js /-->
<script type="text/javascript" src="<?php echo AD_JS;?>table/btn_reponer.js"></script>

<script>
	const TB_reponer = new TableButton_reponer('#TablaReponer', [
	{
		id: 'bEdit',
		icon: 'fa-solid fa-file-powerpoint',
		toggle: 'modal',
		target: '#modal_add_pedido',
		action: function(){
			const row_reponer = TB_reponer.getDatos();	
			get_replenish(row_reponer);	
		}														
	},
	{
		id: 'bDelete',
		text: 'Delete',
		icon: 'fa-solid fa-file-prescription',
		action: function(){
			const id_reponer = TB_reponer.getSelected();
			delete_replenish(id_reponer);
		}			
	},	
	{
		id: 'bAdd',
		icon: 'fa-solid fa-file-arrow-up',
		toggle: 'modal',
		target: '#modal_dardealta',
		action: function(){
			const row_dardealta = TB_reponer.getDatos();	
			get_replenishProduct(row_dardealta);	
		}														
	},
]);
	TB_reponer.parse();
</script>	