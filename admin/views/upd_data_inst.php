<!--/ Supplier /-->
<div id='modal_GetSupplier' class="modal fade" id="edit_supplier" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
	    <div class="modal-content">
		    <div class="modal-header">
			    <h5 class="modal-title" id="exampleModalLabel">Actualizar - Datos</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="btn_exit('#modal_GetSupplier')">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			
			<div class="modal-body">
				<form id="frm_UpdateSupplier">	
					<label>Código</label></br>
					<input type="number" hidden = "" class="form-control" id="edit_codeH" name="edit_codeH"></br>              
					<input type="number" class="form-control" disabled id="edit_codeD" name="edit_codeD"></br>
					<label>Proveedor</label></br>
					<input type="text" class="form-control" id="edit_supplier" name="edit_supplier" required='required' pattern='[A-Za-z Á-É-Í-Ó-Úá-é-í-ó-ú]+' placeholder="Ingrese el Proveedor"></br>                    	
					<label>Telefono</label></br>
					<input type="tel" class="form-control" id="edit_phone" name="edit_phone" required='required' pattern='[0-9- ]+' placeholder="(Código de área) Número"></br>              
					<label>Correo</label></br>
				    <input type="email" class="form-control" id="edit_mail" name="edit_mail" required='required' placeholder="Ingrese el Correo"></br>               
				
					<button type="button" id="btn_supplier_edit" class="btn_OP_sub btn-submit" data-dismiss="modal">Agregar</button>
				</form>
			</div>
				
			<div class="modal-footer">
				<button type="button" class="btn_OP_close btn-close" data-dismiss="modal" onclick="btn_exit('#modal_GetSupplier')">Cerrar</button>		    
			</div>
		</div>
	</div>
</div>

<!--/ Dar de Alta /-->
<div id='modal_GetProductStock' class="second_modal fade" id="dar_de_alta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="second_modal-dialog" role="document">
	    <div class="second_modal-content">
		    <div class="second_modal-header">
			    <h5 class="second_modal-title" id="exampleModalLabel">Editar - Producto </h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="btn_exit('#modal_GetProductStock')">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			
			<div class="second_modal-body">

				<form id="frm_editDardeAlta">	
					
					
					<label>Código</label></br>
					<input type="text" class="form-control size" disabled id="edit_codeDaD" name="edit_codeDaD"></br>
					<input type="text" hidden = "" class="form-control" id="edit_codeDaH" name="edit_codeDaH">
					              
					<label>Cód. alt.</label></br>
					<input type="text" class="form-control size" id="edit_codealt" name="edit_codealt" required='required'></br>
					<label>Producto | Descripción</label></br>
					<input type="text" class="form-control" id="edit_productdescrip" name="edit_productdescrip" required='required'></br>
					<label>Stock</label></br>
					<input type="text" class="form-control size" id="edit_stock" name="edit_stock" required='required' pattern='[0-9- ]+'></br>
					<label>Caja</label></br>
					<input type="text" class="form-control size" id="edit_caja" name="edit_caja" required='required' placeholder="Caja_n.n | _n.n.n"></br>
					<label>Prioridad yes | not | x</label></br>
					<input type="text" class="form-control size" id="edit_priority" name="edit_priority" required='required'></br>
                			
					<div class="second_modal-body-">
						<button type="button" id="btn_dar_de_alta" class="btn_OP_sub btn-submit" data-dismiss="modal">Agregar</button>
					</div>
				</form>
			</div>
					
			<div class="modal-footer">
				<button type="button" class="btn_OP_close btn-close" data-dismiss="modal" onclick="btn_exit('#modal_GetProductStock')">Cerrar</button>		    
			</div>	
		</div>
	</div>
</div>

<!--/ Depósito /-->
<div id='modal_GetDeposito' class="second_modal fade" id="deposito" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="second_modal-dialog" role="document">
	    <div class="second_modal-content">
		    <div class="second_modal-header">
			    <h5 class="second_modal-title" id="exampleModalLabel">Editar - Depósito </h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="btn_exit('#modal_GetDeposito')">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			
			<div class="second_modal-body">

				<form id="frm_editDeposito">	
					
					
					<label>Código</label></br>
					<input type="text" class="form-control size" disabled id="edit_codeDaDD" name="edit_codeDaDD"></br>
					<input type="text" hidden = "" class="form-control" id="edit_codeDaHD" name="edit_codeDaHD">
					              
					<label>Cód. alt.</label></br>
					<input type="text" class="form-control size" id="edit_codealtD" name="edit_codealtD" required='required'></br>
					<label>Producto | Descripción</label></br>
					<input type="text" class="form-control" id="edit_productdescripD" name="edit_productdescripD" required='required'></br>
					<label>Cantidad</label></br>
					<input type="number" class="form-control size" id="edit_amount" name="edit_amount" required='required' pattern='[0-9- ]+'></br>
					<label>Lugar</label></br>
					<p>Negocio ~ N | Nestor ~ B | Silvano ~ S</p>
					<input type="text" class="form-control size" id="edit_place" name="edit_place" required='required'></br>
					
					<div class="second_modal-body-">
						<button type="button" id="btn_deposito" class="btn_OP_sub btn-submit" data-dismiss="modal">Agregar</button>
					</div>
				</form>
			</div>
					
			<div class="modal-footer">
				<button type="button" class="btn_OP_close btn-close" data-dismiss="modal" onclick="btn_exit('#modal_GetDeposito')">Cerrar</button>		    
			</div>	
		</div>
	</div>
</div>


<!--/ Stock - Inicio /-->
<div id='modal_GetCajaStock' class="second_modal fade" id="add_box" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="second_modal-dialog" role="document">
	    <div class="second_modal-content">
		    <div class="second_modal-header">
			    <h5 class="second_modal-title" id="exampleModalLabel">Modificar - Stock Crit.</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="btn_exit('#modal_GetCajaStock')">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			
			<div class="modal-body">
			<form id="frm_cajastockM">			
				<label>Caja</label></br> 
				<input type="text" class="form-control" disabled id="boxCsD" name="boxCsD"> 
				<input type="text" hidden = "" class="form-control" id="boxCsH" name="boxCsH"></br>             
				<label>Stock Mín.</label></br>
				<p>Poniendo: 9999 equivale 0 </p>
				<input type="number" class="form-control" id="Cstock_min" name="Cstock_min" required='required' maxlength="4" placeholder="Ingrese el Stock Mín."></br>
				<label>Stock Crit.</label></br>
				<input type="number" class="form-control" id="Cstock_cri" name="Cstock_cri" required='required' maxlength="4" placeholder="Ingrese el Stock Cri."></br>
				
				<button type="button" id="btn_cajaStockMinimun_upd" class="btn_OP_sub btn-submit" data-dismiss="modal">Agregar</button>
				
			</form>
		</div>
			
			<div class="modal-footer">
			    <button type="button" class="btn_OP_close btn-close" data-dismiss="modal" onclick="btn_exit('#modal_GetCajaStock')">Cerrar</button>		    
			</div>
		</div>
	</div>
</div>

<!--/ Sold Detail /-->
<div id='modal_GetSoldDetail' class="second_modal fade" id="sold_detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="second_modal-dialog" role="document">
	    <div class="second_modal-content">
		    <div class="second_modal-header">
			    <h5 class="second_modal-title" id="exampleModalLabel">Devolver Producto</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="btn_exit('#modal_GetSoldDetail')">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			
			<div class="second_modal-body">

				<form id="frm_editSoldetail">	
				
					<input type="int" hidden = "" class="form-control" id="edit_idSD" name="edit_idSD">
					<label>Código</label></br>
					<input type="text" class="form-control size" disabled id="edit_codeSD" name="edit_codeSD"></br>
					<input type="text" hidden = "" class="form-control" id="edit_HcodeSD" name="edit_HcodeSD">	              
				   	<label>Producto | Descripción</label></br>
					<input type="text" class="form-control" disabled id="edit_descriSD" name="edit_descriSD"></br>                    	
					<label>Cantidad</label></br>
					<p>Actual: <span id="Act"></span></p>
					<input type="numer" class="form-control size" id="edit_amountSD" name="edit_amountSD" required='required' pattern='[0-9- ]+' placeholder="N° para devolver"></br> 
					<input type="numer" hidden = "" class="form-control" id="edit_HamountSD" name="edit_HamountSD">	                   				
					<label>Fecha</label></br>
				    <input type="text" class="form-control size" disabled id="edit_dataSD" name="edit_dataSD"></br> 
					
					<div class="second_modal-body-">
						<button type="button" id="btn_soldDetail_upd" class="btn_OP_sub btn-submit" data-dismiss="modal">Agregar</button>
					</div>
				</form>
			</div>
					
			<div class="modal-footer">
				<button type="button" class="btn_OP_close btn-close" data-dismiss="modal" onclick="btn_exit('#modal_GetSoldDetail')">Cerrar</button>		    
			</div>	
		</div>
	</div>
</div>
