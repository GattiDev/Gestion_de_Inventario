<?PHP 

    include ('../setting/database.php');
	require_once "models/admin_model.php";
	include ('../setting/st_gallery.php');
	
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<!--/ Para que funcione en los navegadores viejos /-->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<!--/ Para los celulares, para que no hagan zoom /-->
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<title>GattiDev : : Gestión de Inventarios</title>
		<!--/ Icon /-->
		<?php $dataIcon = $Image_Icon->Get_Image($titleIcon, $DestinyIcon);
    		while($getIcon = mysqli_fetch_assoc($dataIcon)){ 
				//--> Construyo la imagen
				$Icon = "href='data:".$getIcon['type'].";base64,".base64_encode($getIcon['image'])."'";
				echo "<link rel='shortcut icon'". $Icon .">";
			}
		?> 
		<!--/ Styles /-->
		<link rel="stylesheet" type="text/css" href="<?php echo CSS_URL;?>styles.css" />

		<!--/ Font Awesome V6 /-->
		<script src="https://kit.fontawesome.com/e28972e8bb.js" crossorigin="anonymous"></script>
		
		<!--/ JS /-->
		<script src="<?php echo AD_JS; ?>welcomeAdmin.js"></script>
		<script src="<?php echo AD_INSERT; ?>admbtn_ist.js"></script>
		<script src="<?php echo BOOKSTORES_URL; ?>jquery/jquery-3.7.0.min.js"></script>
				
		<!--/ ALERTIFY /-->	
		<link rel="stylesheet" type="text/css" href="<?php echo BOOKSTORES_URL;?>alertify/css/alertify.css">
		<link rel="stylesheet" type="text/css" href="<?php echo BOOKSTORES_URL;?>alertify/css/themes/bootstrap.css">
		<script src="<?php echo BOOKSTORES_URL;?>alertify/alertify.js"></script>
		
		<link rel="stylesheet" type="text/css" href="<?php echo BOOKSTORES_URL;?>select2/select2.min.css">
		<script src="<?php echo BOOKSTORES_URL;?>select2/select2.min.js"></script>
	</head>
    <body>
        <div id="content">
			
			<!-- Head Content - Inicio -->
			<header id="head_content">
                <span id="logobox">
					<?php $dataBanner = $Image_Banner->Get_Image($Banner, $DestinyBanner);
						while($getBanner = mysqli_fetch_assoc($dataBanner)){ 
							$Banner = "src='data:".$getBanner['type'].";base64,".base64_encode($getBanner['image'])."'";
							echo "<img ". $Banner ." alt='Banner GattiDev' class='img1' />";
						}
					?>
				</span>
				
				<address class="datebox">
				    <div class="fecha">
						<p id="date" class="date"></p>
					</div>
	
					<div class="reloj">
						<p id="time" class="time"></p>
					</div>
				</address>				
			</header> 
			
			<!-- Main Content - Inicio -->
			<main id="main_content">
				<nav id="section_button">	
                    
            		<a class="menu-btn" onclick="btn_proveedor()">
                        <span class="title">Proveedor</span>
                            <i class="icon fa-solid fa-id-card-clip"></i>                 	  
                        </span>
                    </a>

					<a class="menu-btn" onclick="btn_dardeAlta()"> 
                        <span class="title">Dar de alta</span>
                        <i class="icon fa-solid fa-people-carry-box"></i>
                    </a> 

					<a class="menu-btn" onclick="btn_cajaStock()">
                        <span class="title">Caja Stock</span>
                        <i class="icon fa-solid fa-box"></i>
                    </a>

                    <a class="menu-btn" onclick="btn_dardeBaja()">
                        <span class="title">Dar de baja</span>
                        <i class="icon fa-solid fa-truck-ramp-box"></i>
                    </a>

                    <a class="menu-btn" onclick="btn_inventario()">
                        <span class="title">Inventario</span>
                            <i class="icon fa-solid fa-clipboard-check"></i>                  	  
                        </span>
                    </a>
                    
                    <br/>

                    <a class="menu-btn" onclick="btn_reponer()">
                        <span class="title">Reponer</span> 
                            <i class="icon fa-solid fa-truck-fast"></i>                   	  
                        </span>
                    </a>

                    <a class="menu-btn" onclick="btn_detalle()">
                        <span class="title">Detalle</span>
                            <i class="icon fa-solid fa-clipboard-list"></i>                 	  
                        </span>
                    </a>

					<a class="menu-btn" onclick="btn_deposito()">			
						<span class="title">Depósito</span>
							<i class="icon fa-solid fa-cubes"></i>
						</span>
    				</a>

                    <a class="menu-btn" href='<?php echo VIEWSAD_URL;?>graph.php'>
                        <span class="title">Gráfico</span>
                            <i class="icon fa-solid fa-chart-pie"></i>                  	  
                        </span>
                    </a>

                    <a class="menu-btn" onclick="btn_archivo()">
                        <span class="title">Archivos</span>
                            <i class="icon fa-solid fa-file-pdf"></i>                  	  
                        </span>
                    </a>

					<a class="menu-btn" title="Actualizar . . . " href="<?php echo AD_URL; ?>update_data.php">
						<i class="icon fa-solid fa-rotate fa-spin"></i>                  	  
                    </a>

				</nav>

				<h2 id="titulo"></h2>
				
				<aside id="table">
					<section class="tb_proveedor"></section>
					<section class="tb_dardeAlta"></section>
					<section class="tb_cajaStock"></section>    
					<section class="tb_dardeBaja"></section>
					<section class="tb_inventario"></section>
					<section class="tb_reponer"></section>
					<section class="tb_deposito"></section>
					<section class="perdir"></section>
					<section class="tb_detalle"></section>
					<section class="archivosPDF"></section>    
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

		<!-- OPCIONES PARA COMPLETAR -->
        <?php require_once 'views/insert_data.php'; ?>	
		
        <script type="text/javascript" src="<?php echo JS_URL;?>time.js"></script>
	</body>
</html>	

<!--/ Metodos /-->
<script type="text/javascript" src="<?php echo AD_METHOD;?>adm_get_mt.js"></script>
<script type="text/javascript" src="<?php echo AD_METHOD;?>adm_put_mt.js"></script>
<script type="text/javascript" src="<?php echo AD_METHOD;?>adm_update_mt.js"></script>
<script type="text/javascript" src="<?php echo AD_METHOD;?>adm_delete_mt.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
		$('#controlBuscador').select2();
	});
</script>