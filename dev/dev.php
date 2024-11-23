<?PHP 
    include ('../setting/database.php');
	require_once "models/main_model.php";
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
		<link rel="stylesheet" type="text/css" href="<?php echo GD_CSS;?>dev_styles.css" />

		<!--/ Font Awesome V6 /-->
		<script src="https://kit.fontawesome.com/e28972e8bb.js" crossorigin="anonymous"></script>
		
		<!--/ JS /-->
		<script src="<?php echo GD_JS; ?>welcomeGattiDev.js"></script>
		<script src="<?php echo GD_INSERT; ?>devbtn_ist.js"></script>
		<script src="<?php echo BOOKSTORES_URL; ?>jquery/jquery-3.7.0.min.js"></script>
				
		<!--/ ALERTIFY /-->	
		<link rel="stylesheet" type="text/css" href="<?php echo BOOKSTORES_URL;?>alertify/css/alertify.css">
		<link rel="stylesheet" type="text/css" href="<?php echo BOOKSTORES_URL;?>alertify/css/themes/bootstrap.css">
		<script src="<?php echo BOOKSTORES_URL;?>alertify/alertify.js"></script>
			
	</head>
    <body>
        <div id="content">
			
			<!-- Head Content - Inicio -->
			<header id="head_content">
                <span id="logobox">
					<?php $dataBanner = $Image_Banner->Get_Image($Banner, $DestinyBanner);
						while($getBanner = mysqli_fetch_assoc($dataBanner)){ 
							//--> Construyo la imagen
							
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
			<!-- Head Content - Fin -->
			
			<!-- Main Content - Inicio -->
			<main id="main_content">
				<nav id="section_button">	
                    
            		<a class="menu-btn" onclick="btn_admin()">
                        <span class="title">Administrador</span>
							<i class="icon fa-solid fa-user"></i>                      	  
                        </span>
                    </a>

					<a class="menu-btn" onclick="btn_lincense()">
                        <span class="title">Licencia</span>
                        <i class="icon fa-solid fa-award fa-bounce"></i>
                    </a> 

					<a class="menu-btn" onclick="btn_updateImage()">
                        <span class="title">Subir Imagenes</span>
                        <i class="icon fa-solid fa-cloud-arrow-up"></i>
                    </a>

                    <a class="menu-btn" onclick="btn_image()">
                        <span class="title">Imagenes</span>
                        <i class="icon fa-solid fa-images fa-beat"></i>
                    </a>
				</nav>

				<h2 id="titulo"></h2>
				
				<aside id="table">
					<section class="tb_admin"></section>
					<section class="tb_lincense"></section>
					<section class="up_image"></section>
                   
				</aside>	
				<section class="image"></section>	
			</main> 
            <!-- Footer - Inicio -->
            <footer id="footer_content">
			    <h6 class="copybox"> GD | 2023 - <?php echo date("Y");?> | Todos los derechos reservados | </h6>
			    <p class="devbox">
					&copy; Developed and Designed by GattiDev
				</p>
            </footer>
			<!-- Footer - Fin -->
			
		</div>

		<!-- OPCIONES PARA COMPLETAR -->
        <?php //---> OPCIONES PARA COMPLETAR -->
			require_once 'views/insert_data.php';
		?>	
		
        <script type="text/javascript" src="<?php echo GD_JS;?>time.js"></script>
	</body>
</html>	

<!--/ Generador de Contraseña /-->
<script type="text/javascript" src="<?php echo GD_KEY;?>key-generator.js"></script>
<script type="text/javascript" src="<?php echo GD_KEY;?>automatic-key-generator.js"></script>
<!--/ Metodos /-->
<script type="text/javascript" src="<?php echo GD_METHOD;?>get_mt.js"></script>
<script type="text/javascript" src="<?php echo GD_METHOD;?>put_mt.js"></script>
<script type="text/javascript" src="<?php echo GD_METHOD;?>update_mt.js"></script>
<script type="text/javascript" src="<?php echo GD_METHOD;?>delete_mt.js"></script>