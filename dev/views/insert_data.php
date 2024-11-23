<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        /////////////////////////////////////////////// ADD ///////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////--->
<!--/ Setting - Inicio /-->
<div id='modal_setting' class="modal fade" id="add_setting" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
	    <div class="modal-content">
		    <div class="modal-header">
			    <h5 class="modal-title" id="exampleModalLabel">Generando Lisencia</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="btn_exit('#modal_setting')">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			
			<div class="modal-body">
				<form id="frm_setting">
					<label>Administrador</label></br>
					<input type="text" class="form-control" id="adm" name="adm" maxlength="12" required='required' placeholder="Admin..."></br>              
					<label>Licencia</label></br>
                    <input type="text" class="form-control" disabled id="lincenseD" name="lincenseD"></br>
                    <input type="text" hidden = "" class="form-control" id="lincenseH" name="lincenseH"></br>                     	
					<label>Fecha de Renovar</label></br>
					<input type="date" class="form-control" id="fecha" name="fecha" required='required'></br>              
					
					<button type="button" id="btn_setting_add" class="btn_OP_sub btn-submit" data-dismiss="modal">Agregar</button>
				</form>
			</div>
				
			<div class="modal-footer">
				<button type="button" class="btn_OP_close btn-close" data-dismiss="modal" onclick="btn_exit('#modal_setting')">Cerrar</button>		    
			</div>
		</div>
	</div>
</div>

<!--/ Administrator - Inicio /--> 
<div id='modal_administrator' class="modal fade" id="add_administrator" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
	    <div class="modal-content">
		    <div class="modal-header">
			    <h5 class="modal-title" id="exampleModalLabel">Creando Administrador</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="btn_exit('#modal_administrator')">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			
			<div class="modal-body">
				<form id="frm_administrator">

					<label>Administrador</label></br>
					<select class="form-control" name="id_setting">
                		<option value="0">Seleccionar:</option>
                		<?php
							$obj_Run = new Run_Model();
							$data_setting = $obj_Run->Run_setting();
							                    	
                      		while($get_setting = mysqli_fetch_assoc($data_setting)){ 

								if($get_setting['administrator'] != 'GattiDev'){ ?>  
									
									<option  value="<?php echo $get_setting['id']; ?>"> <?php echo $get_setting['administrator']; ?></option>                      				
            	 	    			
								<?php }
							}
						?>
                	</select>
					              
					<label>Contraseña</label></br>
                    <input type="text" class="form-control" id="pass" name="pass" maxlength="8" required='required' placeholder="Ingrese la clave . . . ">
                                     
					<button type="button" id="btn_administrator_add" class="btn_OP_sub btn-submit" data-dismiss="modal">Agregar</button>
				</form>
			</div>
				
			<div class="modal-footer">
				<button type="button" class="btn_OP_close btn-close" data-dismiss="modal" onclick="btn_exit('#modal_administrator')">Cerrar</button>		    
			</div>
		</div>
	</div>
</div>

<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        /////////////////////////////////////////////// UPDATE ///////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////--->
<!--/ Administrator - Inicio /-->
<div id='modal_administratorUP' class="modal fade" id="administratorUP" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
	    <div class="modal-content">
		    <div class="modal-header">
			    <h5 class="modal-title" id="exampleModalLabel">Cambiar Licencia</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="btn_exit('#modal_administratorUP')">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			
			<div class="modal-body">
				<form id="frm_UPadministrator">	
					
					<input type="number" hidden = "" class="form-control" id="up_id" name="up_id"></br>              
					<label>Administrador</label></br>
					<input type="text" class="form-control" disabled id="up_admD" name="up_admD"></br>
					<input type="text" hidden = "" class="form-control" id="up_admH" name="up_admH"></br>                   	
					<label>Licencia</label></br>
					<input type="tel" class="form-control" id="up_licencia" name="up_licencia" required='required' placeholder="Generar Licencia . . ."></br>              
					<div class="bt-license">
                        <button class="btn_icon" id="btnGenerate"><i class="fa-solid fa-award"></i></button>
                    </div>
					<label>Fecha</label></br>
				    <input type="date" class="form-control" id="up_fecha" name="up_fecha" required='required'></br>               
				
					<button type="button" id="btn_Up_administrator" class="btn_OP_sub btn-submit" data-dismiss="modal">Actualizar</button>
				</form>
			</div>
				
			<div class="modal-footer">
				<button type="button" class="btn_OP_close btn-close" data-dismiss="modal" onclick="btn_exit('#modal_administratorUP')">Cerrar</button>		    
			</div>
		</div>
	</div>
</div>