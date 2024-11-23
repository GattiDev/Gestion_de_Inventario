<?php 
    include ('../../../setting/database.php');
    require_once "../../models/main_model.php";

    $obj_run = new Run_Model();
	$Get_Setting = $obj_run->Run_setting();
?>

<table id="dt_setting" class="datatable"> 
	<thead>
	    <tr> 
			<th>Check</th>
			<th>Id</th>
			<th>Administrador</th>
			<th>Licencia</th>
            <th>Fecha</th>
		</tr>
	</thead>
			
	<tbody>
		<?php 
			while ($data_setting = mysqli_fetch_assoc($Get_Setting)) { 
                
	
				$fecha = new DateTime($data_setting['date']);
				$fecha_d_m_y = $fecha->format('d/m/Y');?>
				
				<tr>
					<td class="table-checkbox"><input type="checkbox" name="" id=""></td>
					<td><?php echo $data_setting['id']; ?></td>
					<td><?php echo $data_setting['administrator']; ?></td>
					<td><?php echo $data_setting['lincense']; ?></td>
                    <td><?php echo $fecha_d_m_y; ?></td>
				</tr>
			<?php } 
        ?>			
	</tbody>
</table>

<!--/ Js /-->
<script type="text/javascript" src="js/tb_botton.js"></script>

<script>
	function mostrar(modal){
		var views = document.querySelector(modal);
		views.style.display = "block";
	}

	const dt_setting = new DT_Botton('#dt_setting', [
		{
			id: 'bAdd',
			text: 'Add',
			icon: 'fa-solid fa-key',
			toggle: 'modal',
			target: '#add_setting',
			action: function(){
                automatic_key();
				mostrar('#modal_setting');	
			}
		},
		{
			id: 'bDelete',
			text: 'Delete',
			icon: 'fa-solid fa-trash-can',
			action: function(){
				const code_setting = dt_setting.getSelected();					
				delete_setting(code_setting);
			}		
		},
	]);
	dt_setting.parse();
</script>