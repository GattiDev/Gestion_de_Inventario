<?php 
    include ('../../setting/database.php'); /* --> Importo la Base de Dato*/
    require_once "../../admin/models/admin_model.php";

    $obj_run = new Run_Model();
	$data_product = $obj_run->Run_Product();    
?>

<!-- Cargar Página -->
<script src="<?php echo JS_URL; ?>load_page.js"></script>

<table id="TB_EstadoProductos" class="datatable"> 
	<thead>
	    <tr> 
			<th>Estado</th>
            <th>Cód.</th>
            <th>Cód. alt.</th>
			<th>Producto | Descripción</th>	
            <th>Stock</th>
			<th></th>
		</tr>
	</thead>
			
	<tbody>
		<?php 
			while ($get_product = mysqli_fetch_assoc($data_product)) { ?>
    
                <tr>		
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
					<td><?php echo $get_product['code']; ?></td>
                    <td><?php echo $get_product['alternate_code']; ?></td>
					<td><?php echo $get_product['product_description']; ?></td>
                    <td><?php echo $get_product['stock']; ?></td>
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
<script type="text/javascript" src="<?php echo JS_URL;?>table/tb_Product.js"></script>

<script>
	const TB_EstadoProductos = new Table_Productos('#TB_EstadoProductos', [] );
	TB_EstadoProductos.parse();
</script>
