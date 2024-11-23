<?php 
    include ('../../../setting/database.php');
    require_once "../../models/main_model.php";
    
    // Obtengo todo los datos de la Tabla de Productos
    $obj_run = new Run_Model();
	$Get_Administrator = $obj_run->Run_administrator();
?>

<table id="dt_administrator" class="datatable"> 
	<thead>
	    <tr> 
			<th>Check</th>
			<th>Id</th>
			<th>Administrador</th>
			<th>Contraseña</th>
			<th>Licencia</th>
            <th>Fecha</th>
		</tr>
	</thead>
			
	<tbody>
		<?php 
			/*Bucle para ir poniendo cada dato a su fila corespondiente*/
			while ($data_administrator = mysqli_fetch_assoc($Get_Administrator)) { 

                /*Acá le cambio el formato a la fecha*/
				$fecha = new DateTime($data_administrator['date']);
				$fecha_d_m_y = $fecha->format('d/m/Y');

				if($data_administrator['name'] != 'GattiDev'){ ?>
					<tr>
						<td class="table-checkbox"><input type="checkbox" name="" id=""></td>
						<td><?php echo $data_administrator['id_setting']; ?></td>
						<td><?php echo $data_administrator['name']; ?></td>
						<td><?php echo $data_administrator['password']; ?></td>
						<td><?php echo $data_administrator['lincense']; ?></td>
                    	<td><?php echo $fecha_d_m_y; ?></td>
					</tr>
				<?php }
			} 
        ?>			
	</tbody>
</table>

<!--/ Js /-->
<script type="text/javascript" src="<?php echo GD_JS;?>tb_botton.js"></script>

<script>

	const dt_administrator = new DT_Botton('#dt_administrator', [
		{
			id: 'bEdit',
			icon: 'fa-solid fa-user-pen',
			toggle: 'modal',
			target: '#modal_administratorUP',
			action: function(){
				const row_administrator = dt_administrator.getDatos();	
				get_datatb_administrator(row_administrator);
			}															
		},
	]);
	dt_administrator.parse();
</script>