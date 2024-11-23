<?php 
    include ('../../../setting/database.php');
    require_once "../../models/main_model.php";
    
    // Obtengo todo los datos de la Tabla de Productos
    $obj_run = new Run_Model();
	$Get_Image = $obj_run->Run_image();
    $Get_SeeImage = $obj_run->Run_image();
?>

<table id="dt_image" class="datatable"> 
	<thead>
	    <tr> 
			<th>Check</th>
			<th>Id</th>
			<th>Destino</th>
			<th>Titulo</th>
			<th>Archivo</th>
		</tr>
	</thead>
			
	<tbody>
		<?php 
			/*Bucle para ir poniendo cada dato a su fila corespondiente*/
			while ($data_image = mysqli_fetch_assoc($Get_Image)) { 
                $img = "src='data:".$data_image['type'].";base64,".base64_encode($data_image['image'])."'"; ?>
               	<tr>
				    <td class="table-checkbox"><input type="checkbox" name="" id=""></td>
					<td><?php echo $data_image['id']; ?></td>
					<?php
						//Condicion si se cumple
						switch ($data_image['id_destiny']){
							case 1:
								echo "<td>1 | Accesorios</td>";
								break;
							case 2:
								echo "<td>2 | Banner</td>";
								break;
							case 3:
								echo "<td>3 | Icono</td>";
								break;
							case 4:
								echo "<td>4 | Logo</td>";
								break;
							case 5:
								echo "<td>5 | Otras</td>";
								break;						
						}
					?>
					<td><?php echo $data_image['title']; ?></td>
					<td><?php echo $data_image['archive']; ?></td>                
				</tr>
			<?php
			} 
        ?>			
	</tbody>
</table>

<?php require_once ("../SeeImage.php");?>

<!--/ Js /-->
<script type="text/javascript" src="<?php echo GD_JS;?>tb_botton.js"></script>

<script>

	const dt_image = new DT_Botton('#dt_image', [
		{
			id: 'bDelete',
			text: 'Delete',
			icon: 'fa-solid fa-trash-can',
			action: function(){
				const code_image = dt_image.getSelected();					
				delete_image(code_image);
			}																
		},
	]);
	dt_image.parse();
</script>
