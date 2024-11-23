<?php 
    include ('../../../setting/database.php');
    require_once "../../models/admin_model.php";

    $obj_run = new Run_Model();
	$data_box = $obj_run->Run_box();
    
?>

<table id="TB_cajaStock" class="datatable"> 
	<thead>
	    <tr> 
            <th>Check</th>
			<th>Caja</th>
            <th>Stock</th>
			<th>Stock Mín.</th>
            <th>Stock Crit.</th>
		</tr>
	</thead>
			
	<tbody>
		<?php 
			while ($get_box = mysqli_fetch_assoc($data_box)) { ?>
				                
				<tr>					
                  	<td><?php echo $get_box['box']; ?></td> 
					<td><?php echo $get_box['stock']; ?></td>
					<?php 
						if($get_box['minimun_product'] == '9999'){
							echo "<td>0</td>";
						}else{
							echo "<td>" . $get_box['minimun_product'] . "</td>";
						}

						if($get_box['critical_product'] == '9999'){
							echo "<td>0</td>";
						}else{
							echo "<td>" . $get_box['critical_product'] . "</td>";
						}
					?>      
                    
                </tr>  
            <?php } 
        ?>			
	</tbody>
</table>

<!--/ Js /-->
<script type="text/javascript" src="<?php echo AD_JS;?>table/btn_cajaStock.js"></script>

<script>
	const TB_cajaStock = new TbBtn_cajaStock('#TB_cajaStock', [

        {
			id: 'bEdit',
			text: 'Edit',
			icon: 'fa-solid fa-pen-to-square',
			toggle: 'modal',
			target: '#update_stock',
			action: function(){
				const row_cajaStock = TB_cajaStock.getDatos();	
				get_cajaStock(row_cajaStock);
			}													
		},
    ] );
    
	TB_cajaStock.parse();
</script>
