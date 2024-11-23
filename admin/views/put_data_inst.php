<!--/ Supplier /-->
<div id='modal_PutSupplier' class="modal fade" id="add_supplier" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
	    <div class="modal-content">
		    <div class="modal-header">
			    <h5 class="modal-title" id="exampleModalLabel">Agrega - Proveedor</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="btn_exit('#modal_PutSupplier')">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			
			<div class="modal-body">
				<form id="frm_supplier">
					<label>Código</label></br>
					<input type="number" class="form-control" id="code" name="code" required='required' pattern='[0-9- ]+' placeholder="Ingrese el Código"></br>              
					<label>Proveedor</label></br>
					<input type="text" class="form-control" id="supplier" name="supplier" required='required' pattern='[A-Za-z Á-É-Í-Ó-Úá-é-í-ó-ú]+' placeholder="Ingrese el Proveedor"></br>                    	
					<label>Telefono</label></br>
					<input type="phone" class="form-control" id="phone" name="phone" required='required' pattern='[0-9- ]+' placeholder="(Código de área) Número"></br>              
					<label>Correo</label></br>
				    <input type="email" class="form-control" id="mail" name="mail" required='required' placeholder="Ingrese el Correo"></br>               
				
					<button type="button" id="btn_supplier_add" class="btn_OP_sub btn-submit" data-dismiss="modal">Agregar</button>
				</form>
			</div>
				
			<div class="modal-footer">
				<button type="button" class="btn_OP_close btn-close" data-dismiss="modal" onclick="btn_exit('#modal_PutSupplier')">Cerrar</button>		    
			</div>
		</div>
	</div>
</div>

<!--/ Product /-->
<div id='modal_PutProduct' class="second_modal fade" id="add_product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="second_modal-dialog" role="document">
	    <div class="second_modal-content">
		    <div class="second_modal-header">
			    <h5 class="second_modal-title" id="exampleModalLabel">Agregar - Productos</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="btn_exit('#modal_PutProduct')">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			
			<div class="second_modal-body">
				<form id="frm_product">	
				<label>Proveedor</label><br>
				<select id="controlBuscador" class="form-control" name="id_supplier" style="width: 70%">
                	<option value="0">Seleccionar:</option>
                	<?php
						$obj_run1 = new Run_Model();
						$data_supplier = $obj_run1->Run_supplier();
						
	                    // Realizamos la consulta para extraer los datos
						while ($ver = mysqli_fetch_row($data_supplier)) {?>
						<option value="<?php echo $ver[0] ?>">
							<?php echo $ver[1]. ' - ' .$ver[2]; ?>
						</option>
    
            	 	    <?php  } 
					?>
                </select><br>
				
				<label>Código</label><br>
				<input type="text" class="form-control size" id="code" name="code" maxlength="12" required='required' placeholder="Ingrese el Código"></br>              
				<label>Código alternativo</label><br>
				<input type="text" class="form-control size" id="code_al" name="code_al" maxlength="12" required='required' placeholder="Ingrese el Código alternativo" value="-"></br>	
				<label>Producto | Descripción</label><br>
				<input type="text" class="form-control" id="product_descrip" name="product_descrip" required='required' placeholder="Ingrese el producto y descripción"></br>
                <label>Stock</label><br>
				<input type="number" class="form-control size" id="stock" name="stock" required='required' maxlength="6" placeholder="Ingrese el Stock" value="0"></br> 	
				<label>Caja</label><br>
				<input type="text" class="form-control size size" id="box" name="box" required='required' placeholder="Caja_n.n | _n.n.n"></br>	
				
				<div class="second_modal-body-">
					<button type="button" id="btn_product_add" class="btn_OP_sub btn-submit" data-dismiss="modal">Agregar</button>
				</div>
			</form>
		</div>
			
			<div class="modal-footer">
			    <button type="button" class="btn_OP_close btn-close" data-dismiss="modal" onclick="btn_exit('#modal_PutProduct')">Cerrar</button>		    
			</div>
		</div>
	</div>
</div>

<!--/ CajaStock /-->
<div id='modal_PutStock' class="second_modal fade" id="add_box" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="second_modal-dialog" role="document">
	    <div class="second_modal-content">
		    <div class="second_modal-header">
			    <h5 class="second_modal-title" id="exampleModalLabel">Agregar - Stock Mín. | Crít.</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="btn_exit('#modal_PutStock')">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			
			<div class="modal-body">
			<form id="frm_cajastock">			 
				<label>Caja</label><br>
				<select class="form-control" name="id_box">
                	<option value="0">Seleccionar:</option>
                	<?php
						$obj_run2 = new Run_Model();
						$data_box = $obj_run2->Run_box();
	                    // Realizamos la consulta para extraer los datos
                      	while($get_box = mysqli_fetch_assoc($data_box)){ 
                      		if($get_box['minimun_product'] == 0){ ?>	
                           		<option  value="<?php echo $get_box['id']; ?>"> <?php echo $get_box['box']; ?></option>
            	 	    	<?php  } 
						} 
					?>
                </select>
				
				<br>
	
				<label>Stock Mín.</label></br>
				<p>Poniendo: 9999 equivale 0 </p>
				<input type="number" class="form-control" id="stock_min" name="stock_min" required='required' maxlength="4" placeholder="Ingrese el Stock Mín." value="9999"></br>
                
                <label>Stock Crít.</label></br>
				<input type="number" class="form-control" id="stock_crit" name="stock_crit" required='required' maxlength="4" placeholder="Ingrese el Stock Crít." value="9999"></br> 	
				
				<button type="button" id="btn_cajaStock_upd" class="btn_OP_sub btn-submit" data-dismiss="modal">Agregar</button>
				
			</form>
		</div>
			
			<div class="modal-footer">
			    <button type="button" class="btn_OP_close btn-close" data-dismiss="modal" onclick="btn_exit('#modal_PutStock')">Cerrar</button>		    
			</div>
		</div>
	</div>
</div>
<!--/ Fin /-->

<!--/ Dar de Baja /-->
<div id='modal_GetProductDB' class="second_modal fade" id="add_sold" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="second_modal-dialog" role="document">
	    <div class="second_modal-content">
		    <div class="second_modal-header">
			    <h5 class="second_modal-title" id="exampleModalLabel">Producto Vendido</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="btn_exit('#modal_GetProductDB')">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			
			<div class="modal-body">
				<form id="frm_dardebaja">
					<label>Código</label></br>
					<input type="text" class="form-control size" disabled id="codeFp" name="codeFp"></br>
					<input type="text" hidden = "" class="form-control size" id="codeHFp" name="codeHFp"></br>              
					<label>Productos</label></br>
					<input type="text" class="form-control" disabled id="productFp" name="productFp"></br>
					<input type="number" hidden = "" class="form-control" id="productFpH" name="productFpH">
                    <label>Cantidad</label></br>
					<p>Disponible: <span id="Stock" style="color: green;"></span></p>
					<input type="number" hidden = "" class="form-control size" id="StockH" name="StockH">
					<input type="number" class="form-control size" id="amount" name="amount" required='required' maxlength="6" placeholder="Ingrese la cantidad"></br> 	
					
					<div class="second_modal-body-">
						<button type="button" id="btn_soldDetail_add" class="btn_OP_sub btn-submit" data-dismiss="modal">Agregar</button>
					</div>
				</form>
			</div>
					
			<div class="modal-footer">
				<button type="button" class="btn_OP_close btn-close" data-dismiss="modal" onclick="btn_exit('#modal_GetProductDB')">Cerrar</button>		    
			</div>			
		</div>
	</div>
</div>

<!--/ Replenish /-->
<div id='modal_GetPedido' class="modal fade" id="add_retoner" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
	    <div class="modal-content">
		    <div class="modal-header">
			    <h5 class="modal-title" id="exampleModalLabel">Agrega - Pedido</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="btn_exit('#modal_GetPedido')">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			
			<div class="modal-body">
				<form id="frm_retoner">
							
					<label>Código</label></br>
					<input type="text" class="form-control" disabled id="codeMR" name="codeMR">
					<input type="text" hidden = "" class="form-control" id="codeHMR" name="codeHMR"></br>

					<label>Producto</label></br>
					<input type="text" class="form-control" disabled id="edit_descriMR" name="edit_descriMR"></br>   
		
					<label>Cantidad a pedir</label></br>
					<input type="number" class="form-control size" id="amount" name="amount" required='required' maxlength="6" placeholder="Ingrese la cantidad a pedir"></br> 	
						
					<button type="button" id="btn_retoner_add" class="btn_OP_sub btn-submit" data-dismiss="modal">Pedir</button>
				</form>
			</div>
				
			<div class="modal-footer">
				<button type="button" class="btn_OP_close btn-close" data-dismiss="modal" onclick="btn_exit('#modal_GetPedido')">Cerrar</button>		    
			</div>
		</div>
	</div>
</div>

<!--/ Dar de Alta /-->
<div id='modal_GetDardealta' class="modal fade" id="add_retone" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
	    <div class="modal-content">
		    <div class="modal-header">
			    <h5 class="modal-title" id="exampleModalLabel">Dar de alta</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="btn_exit('#modal_GetDardealta')">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			
			<div class="modal-body">
				<form id="frm_dardealtaP">
					
					<label>Código</label></br>
					<input type="text" class="form-control" disabled id="codeDA" name="codeDA">
					<input type="text" hidden = "" class="form-control" id="codeHDA" name="codeHDA"></br>

					<label>Producto</label></br>
					<input type="text" class="form-control" disabled id="edit_descriDA" name="edit_descriDA"></br>   

					<label>Cantidad a pedir</label></br>
					<input type="number" class="form-control size" id="amount" name="amount" required='required' maxlength="6" placeholder="Ingrese la cantidad"></br> 	
						
					<button type="button" id="btn_dardealta_add" class="btn_OP_sub btn-submit" data-dismiss="modal">Agregar</button>
				</form>
			</div>
				
			<div class="modal-footer">
				<button type="button" class="btn_OP_close btn-close" data-dismiss="modal" onclick="btn_exit('#modal_GetDardealta')">Cerrar</button>		    
			</div>
		</div>
	</div>
</div>

<!--/ Depósito /-->
<div id='modal_PutDeposito' class="second_modal fade" id="add_deposito" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="second_modal-dialog" role="document">
	    <div class="second_modal-content">
		    <div class="second_modal-header">
			    <h5 class="second_modal-title" id="exampleModalLabel">Agregar - Depósito</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="btn_exit('#modal_PutDeposito')">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			
			<div class="second_modal-body">
				<form id="frm_deposito">	
														
					<label>Código</label><br>
					<input type="text" class="form-control size" id="code" name="code" maxlength="12" required='required' placeholder="Ingrese el Código"></br>              
					
					<label>Código alternativo</label><br>
					<input type="text" class="form-control size" id="code_al" name="code_al" maxlength="12" required='required' placeholder="Ingrese el Código alternativo" value="-"></br>	
				
					<label>Producto | Descripción</label><br>
					<input type="text" class="form-control" id="product_descrip" name="product_descrip" required='required' placeholder="Ingrese el producto y descripción"></br>
                
					<label>Cantidad</label><br>
					<input type="number" class="form-control size" id="amount" name="amount" required='required' maxlength="6" placeholder="Ingrese el Stock" value="0"></br> 	
				
					<label>Depósito</label><br>
					<select class="form-control" name="id_deposito">
						<option value="0">Seleccionar:</option>
						<option value="N"> Negocio</option>	
						<option value="B"> Nestor</option>
						<option value="S"> Silvano</option>
                	</select><br>
					
					<div class="second_modal-body-">
						<button type="button" id="btn_deposito_add" class="btn_OP_sub btn-submit" data-dismiss="modal">Agregar</button>
					</div>
				</form>
			</div>
			
			<div class="modal-footer">
			    <button type="button" class="btn_OP_close btn-close" data-dismiss="modal" onclick="btn_exit('#modal_PutDeposito')">Cerrar</button>		    
			</div>
		</div>
	</div>
</div>
