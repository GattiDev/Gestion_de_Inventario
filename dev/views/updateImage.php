<div id="updateImage">
    <p>Acá podrás subir imagines al sitio web, para eso se debe <b>seleccionar el destino de la imagén</b> y presionar el  <b><i class="fa-solid fa-pen"></i></b> para poder completar los casilleros que corresponde.</p>
    <p>Una vez que ya está todo completado presionar <b><i class="fa-solid fa-cloud-arrow-up"></i></b> para subir la imagen a la base de datos. </p>
                                                        
    <div class="outer-container">
	    <form action="../dev/controllers/add_uploadImage.php" method="POST" name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
            <div class= "subirImg">
                
                <label for="nombre">Destino</label>
                <select id="idDestino" class= "selector" name="idDestino">
                    <option value="0">Seleccione:</option>
                    <option value="1">Accesorios</option>
                    <option value="2">Banner</option>
                    <option value="3">Icono</option>
                    <option value="4">Logo</option>
                    <option value="5">Otras</option>   
                </select>
                   
                <button type="button" id="boton_click" class="btn_subirImg boton_click">
                    <i class="icon fa-solid fa-pen fa-beat"></i>
                </button>
                        
                <br/>                                                  
                                         
                <label for="titulo">Titulo</label>
                <input class="titulo" type="texto" name="titulo" required="required" disabled />
                                                                              
                <br/>
                                       
                <div class="form-group">
                    <input class="file" type="file" class="form-control-file" name="foto" disabled>
                </div>

                <div class="form-group">
                    <button class="btn_subirImg"  name="guardar" disabled>
                        <i class="icon fa-solid fa-cloud-arrow-up"></i>
                    </button>     
                </div>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		
		$('#boton_click').click(function(){            
            /* Para obtener el texto */
            var combo = document.getElementById("idDestino");
            var selected = combo.options[combo.selectedIndex].text;
            console.log(selected);
            if (selected != 'Seleccione:') {

                if (selected == 'Accesorios' || selected == 'Banner' || selected == 'Icono' || selected == 'Logo') {
                    $('.btn_subirImg').attr('disabled', false);
                    $('.titulo').attr('disabled', false);
                    $('.file').attr('disabled', false);
                }

                if (selected == 'Otras') {    
                    $('.titulo').attr('disabled', true);
                    $('.file').attr('disabled', true);
                    $('.btn_subirImg').attr('disabled', true);
                }
            }            
		});
	});

</script>
