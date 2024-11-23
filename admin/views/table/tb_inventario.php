<?php 
    include ('../../../setting/database.php');
    require_once "../../models/admin_model.php";
    
    $obj_run = new Run_Model();
	$data_soldDetail = $obj_run->Run_soldDetail();
?>
<nav id="section_button">	
	<a class="menu-btn" href="<?php echo VIEWSAD_URL?>table/eliminarDatos.php">
 		<i class="fa-solid fa-trash-can-arrow-up"></i>
		<span class="title">Inventarios</span>
	</a>
</nav>

<table id="TablaSoldDetail" class="datatable"> 
	<thead>
		<tr>
			<th>Check</th>
			<th>Estado</th>
			<th>Ident.</th>
			<th>Cód.</th>
			<th>Producto | Descripción</th>	
			<th>Cant.</th>
            <th>Fecha</th>
		</tr>
	</thead>
			
	<tbody>
		<?php            
            while ($get_soldDetail = mysqli_fetch_assoc($data_soldDetail)) { ?>

				<tr>

                    <td class="table-checkbox"><input type="checkbox" name="" id=""></td>
								
                    <?php
                        $obj_get = new Get_Model();
	                    $data_statu = $obj_get->Get_statuId($get_soldDetail['id_statu']);

                        while($get_statu = mysqli_fetch_assoc($data_statu)){ 
							
                            echo "<td><span class='".$get_statu['statu']."'></span></td>";
                        } 
                    ?>

					<td ><?php echo $get_soldDetail['id']; ?></td>

					<td ><?php echo $get_soldDetail['product_code']; ?></td>
								
					<?php
					
						$obj_get = new Get_Model();
                        $data_productBox = $obj_get->Get_productCode($get_soldDetail['product_code']);
						
						while($get_product = mysqli_fetch_assoc($data_productBox)){ 
                            
                            echo "<td >" . $get_product['product_description'] . "</td>";
                        } 
                    ?>
											
					<td ><?php echo $get_soldDetail['amount']; ?></td>
			
					<?php 			
						/*Acá le cambio el formato a la fecha*/
						$fecha = new DateTime($get_soldDetail['date']);
						$fecha_d_m_y = $fecha->format('d/m/Y');
					?>
					
					<td ><?php echo $fecha_d_m_y; ?></td>

				</tr>
			<?php } ?>
	</tbody>
</table>

<!--/ Js /-->
<script type="text/javascript" src="<?php echo AD_JS;?>table/btn_soldDetail.js"></script>

<script>
	const TB_SoldDetail = new DT_BS_detail('#TablaSoldDetail', [
	{
		id: 'bEdit',
		icon: 'fa fa-pencil',
		toggle: 'modal',
		target: '#modal_Sold_Detail',
		action: function(){
			const row_sold_detail = TB_SoldDetail.getDatos();	
			get_soldDetail(row_sold_detail);	
		}														
	},
]);
	TB_SoldDetail.parse();
</script>	