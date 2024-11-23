<?PHP 
    include ('../setting/database.php');
	require_once "models/admin_model.php";
	include ('../setting/st_gallery.php');
    require('../setting/db_processBar.php');
 
    $result = $connexion->query('SELECT COUNT(*) as total_box FROM product');
    $row = $result->fetch_assoc();
    $num_total_rows = $row['total_box'];

    $update_process = 'UPDATE process_bar SET total = '.$num_total_rows.', percentage = 0, executed = 0, execute_time = "", date_add = now() WHERE id = 1';
    $connexion->query($update_process);
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<title>GattiDev : : Gestión de Inventarios</title>
		<?php $dataIcon = $Image_Icon->Get_Image($titleIcon, $DestinyIcon);
    		while($getIcon = mysqli_fetch_assoc($dataIcon)){ 
				$Icon = "href='data:".$getIcon['type'].";base64,".base64_encode($getIcon['image'])."'";
				echo "<link rel='shortcut icon'". $Icon .">";
			}
		?> 
		<link rel="stylesheet" type="text/css" href="<?php echo CSS_URL;?>styles.css" />
		<script src="https://kit.fontawesome.com/e28972e8bb.js" crossorigin="anonymous"></script>
		<script src="<?php echo BOOKSTORES_URL; ?>jquery/jquery-3.7.0.min.js"></script>	

        </script>
        <script type="text/javascript">
            function executeProcess(offset, batch = false) {
                if (batch == false) {
                    batch = 1;
                } else {
                    batch = parseInt(batch);
                }
                
                if (offset == 0) {
                    $('#start_form').hide();
                    $('#sending').show();
                    $('#sended').text(0);
                    $('#total').text($('#total_comments').val());
                    
                    //reset progress bar
                    $('.progress-bar').css('width', '0%');
                    $('.progress-bar').text('0%');
                    $('.progress-bar').attr('data-progress', '0');
                }

                $.ajax({ 
                    type: 'POST',
                    dataType: "json",
                    url : "process.php", 
                    data: {
                        id: 1,
                        offset: offset,
                        batch: batch
                    },
                    success: function(response) {
                        $('.progress-bar').css('width', response.percentage+'%');
                        $('.progress-bar').text(response.percentage+'%');
                        $('.progress-bar').attr('data-progress', response.percentage);
                        
                        $('#done').text(response.executed);
                        $('.execute-time').text(response.execute_time);
                        
                        if (response.percentage == 100) {
                            $('.end-process').show();
                        } else {
                            var newOffset = offset + batch;
                            
                            executeProcess(newOffset, batch);
                        }
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        if (textStatus == 'parsererror') {
                            textStatus = 'Technical error: Unexpected response returned by server. Sending stopped.';
                        }
                        alert(textStatus);
                }
                });
            }
        </script>
	</head>
    
    <body>
        <div id="content">
			<header id="head_content">
                <span id="logobox">
					<?php $dataBanner = $Image_Banner->Get_Image($Banner, $DestinyBanner);
						while($getBanner = mysqli_fetch_assoc($dataBanner)){ 
							$Banner = "src='data:".$getBanner['type'].";base64,".base64_encode($getBanner['image'])."'";
							echo "<img ". $Banner ." alt='Banner GattiDev' class='img1' />";
						}
					?>
				</span>	
			</header> 
			
			<main id="main_content">
				<h2 id="titulo">Actualizando datos</h2>
	
				<aside id="table">

					<div class="dt_data">
						
						<div class="container-progress">
            
            				<h3 class="lead">Hay <?php echo $num_total_rows; ?> productos.</h3>

                			<div id="content" class="col-progress">
                    			<form id="start_form" action="#" method="post">
                        			<input type="hidden" id="total_comments" name="total_comments" value="<?php echo $num_total_rows; ?>" />
                        			<div class="form-group">
                            			<a href="#" class="btnUpdate" onclick="executeProcess(0);return false;">
											Actualizar
                            			</a>
                        			</div>
									
                    			</form>
                			</div>
                
            				<div id="sending" class="col-progress" style="display:none;">
                				<h4 class="lead">Actualizando...</h4>
                
                				<div class="progress">
                    				<div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" data-progress="0" style="width: 0%;">
                        				0%
                    				</div>
                				</div>
                    
                				<div class="counter-sending">
                    				(<span id="done">0</span>/<span id="total">0</span>)
                				</div>

                				<div class="execute-time-content">
                    				Tiempo transcurrido: <span class="execute-time">0 segundos</span>
                				</div>

								<div class="UpdataData"></div>
                				<div class="end-process" style="display:none;">
									¡ La actualización ha sido completada !.
									<a class="btnContinuar" href="stock_main.php">Continuar</a>
                				</div>    
            				</div>  
        				</div>
					</div>
				</aside>	
                   
			</main> 
            <!-- Footer - Inicio -->
            <footer id="footer_content">
			    <h6 class="copybox"> GD | 2023 - <?php echo date("Y");?> | Todos los derechos reservados | V 2.1.1</h6>
			    <p class="devbox">
					&copy; Developed and Designed by GattiDev
				</p>
            </footer>			
		</div>
	</body>
</html>	